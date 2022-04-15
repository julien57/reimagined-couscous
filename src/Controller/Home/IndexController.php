<?php

namespace App\Controller\Home;

use App\Entity\Block;
use App\Entity\Newsletter;
use App\Entity\Page;
use App\Entity\PageBlock;
use App\Form\NewsLetterType;
use App\Repository\ContentRepository;
use App\Repository\MenuRepository;
use App\Service\LangService;
use App\Service\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /** @var array */
    private $classe = [
        //'contact' => \App\Form\ContactType::class,
    ];

    /**
     * page -> entity form.
     *
     * @var array
     */
    public $page_form = [
        //'contact' => ['contact'],
    ];

    /** @var LangService */
    private $langService;

    /** @var ContentRepository */
    private $contentRepository;

    public function __construct(LangService $langService, ContentRepository $contentRepository)
    {
        $this->langService = $langService;
        $this->contentRepository = $contentRepository;
    }

    /**
     * @param $slug
     * @param Request $request
     * @param MenuRepository $menuRepository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     *
     * @Route("/{slug}", name="front_index_page", defaults={"slug": "accueil"})
     */
    public function page($slug, Request $request, MenuRepository $menuRepository)
    {
        $page = $this->getDoctrine()->getRepository(Page::class)->getPageBySlug($slug);
        $locale = $request->getLocale();

        if ($page && $page->getSlugs()[$locale] === $slug) {
            $array = [];
            $datas['slug'] = $slug;
            $datas['page'] = $page;
            $datas['locale'] = $locale;
            $datas['blocks'] = $this->_getDataPage($locale, $page->getId());

            if (empty($datas['blocks'])) {
                return new Response(
                    $this->render('bundles/TwigBundle/Exception/error404.html.twig'),
                    404
                );
            }

            //get Header & Footer
            $datas['header'] = $this->_getDataHeader($locale);
            $datas['footer'] = $this->_getDataFooter($locale);

            $menu = $menuRepository->findOneBy(['name' => 'main_menu']);
            $datas['menus'] = json_decode($menu->getJsonData());
            //$datas['metas'] = [];

            foreach ($datas['blocks'] as $key => $dt) {
                if (isset($dt->datas) && array_key_exists('meta_title', $dt->datas)) {
                    //$datas['metas'] = $dt->datas;
                } else {
                    $sub = [];
                    if (true == $dt->getBlock()->getSubBlock()) {
                        foreach ($dt->getBlockChildrens() as $children) {
                            $templateChildren = $children->getBlock()->getPath();
                            $children->json['template'] = $templateChildren;
                            $sub[] = $children->json;
                        }

                        $dt->datas['sub_blocks'] = $sub;
                    }
                    $template = $dt->getBlock()->getPath();
                    if (isset($dt->datas['lang_block']) && $dt->datas['lang_block'] === $locale) {
                        $array['blocks'][] = ['data' => $dt->datas, 'template' => $template];
                    }
                }
            }

            unset($datas['blocks']);
            $datas = array_merge($datas, $array);
        } else {
            // If !$page redirect to welcome_page
            $pages = $this->getDoctrine()->getRepository(Page::class)->findAll();

            if (!empty($pages)) {
                throw $this->createNotFoundException('Page Not exist');
            }

            return $this->render('home/welcome_page.html.twig', [
                'header' => 'header_default',
                'footer' => 'footer_default',
            ]);
        }

        if (array_key_exists($slug, $this->page_form)) {
            $classe = $this->page_form[$slug][0];

            $model = 'App\\Entity\\'.ucfirst($classe);
            $model = new $model();

            $form = $this->createForm($this->classe[$slug], $model, [
                    'action' => $this->generateUrl('ajax_form'),
                    'slug' => $slug ?? null,
                ]
            );

            $datas['form'] = $form->createView();
        }

        //newsletter
        if ($page) {
            $newsLetter = new NewsLetter();
            $newsletter_form = $this->createForm(NewsletterType::class, $newsLetter, [
                    'action' => $this->generateUrl('ajax_form'),
                ]
            );

            $datas['newsletter_form'] = $newsletter_form->createView();
            $datas['has_newsletter'] = $page->getHasNewsletter();
        }

        return $this->render('home/page/_generic-page.html.twig', $datas);
    }

    /**
     * @param string $locale
     * @param int $pageId
     * @return array
     */
    private function _getDataPage(string $locale, int $pageId)
    {
        $lang = $this->langService->getCodeLanguage($locale);
        $contents = $this->contentRepository->getLangExist($lang, $pageId);

        $arrayPageBlocks = [];

        foreach ($contents as $content) {
            $json = $content->getJson();
            if ($content->getPageBlock()) {
                $content->getPageBlock()->setJsonData($json);
                $arrayPageBlocks[$content->getPageBlock()->getItemOrder()] = $content->getPageBlock();
            } else {
                $content->getBlockChildren()->setJsonData($json);
                $arrayPageBlocks[$content->getBlockChildren()->getPageBlock()->getItemOrder()] = $content->getBlockChildren()->getPageBlock();
            }
        }
        ksort($arrayPageBlocks);

        return $this->_getData($arrayPageBlocks);
    }

    protected function _getDataSite(int $locale)
    {
        $page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->getByPageNameBy('site', $locale);

        return $this->_getData($page_blocks);
    }

    protected function _getDataHeader(string $locale)
    {
        $page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->getbyNameByBlockType('header', $locale);

        return $this->_getData($page_blocks);
    }

    protected function _getDataFooter(string $locale)
    {
        $page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->getbyNameByBlockType('footer', $locale);

        return $this->_getData($page_blocks);
    }

    protected function _getDayliMessage()
    {
        return $this->getDoctrine()->getRepository(Block::class)->findByType(6);
    }

    /*
     * 03/11/2021 update Manage Preview for draft
     */
    protected function _getData(array $page_blocks)
    {
        $request = Request::createFromGlobals();

        foreach ($page_blocks as $key => $pb) {
            $jsonDatas = $request->get('preview') ? $pb->getJsonDataPreview() : $pb->getJsonData();

            $pb->datas = json_decode($jsonDatas ?? $pb->getJsonData(), true);

            if ($pb->getBlock() && true === $pb->getBlock()->getSubBlock()) {
                foreach ($pb->getBlockChildrens() as $p_b) {
                    $p_b->json = json_decode($p_b->getjsonData(), true);
                }
            }
        }

        return $page_blocks;
    }

    /**
     * @Route("/send/newsletter", name="index_home_send_newsletter")
     */
    public function sendNewsletter(Request $request, Mail $mail)
    {
        dd($request->request->all());
    }
}
