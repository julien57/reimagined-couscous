<?php
/**
 * Created by PhpStorm.
 * User: yazidneghiche & his brother Julien
 * Date: 23/03/2021
 * Time: 21:45.
 */

namespace App\Controller\Bo;

use App\Controller\Admin\BlockController as blocks;
use App\Entity\Block;
use App\Entity\Content;
use App\Entity\Language;
use App\Entity\Newsletter;
use App\Entity\Page;
use App\Entity\PageBlock;
use App\Form\LanguageType;
use App\Repository\ContentRepository;
use App\Repository\LanguageRepository;
use App\Repository\PageRepository;
use App\Repository\TimelineRepository;
use App\Service\LangService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class IndexController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var ContentRepository
     */
    private $contentRepository;

    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(EntityManagerInterface $em, ContentRepository $contentRepository, SessionInterface $session)
    {
        $this->em = $em;
        $this->contentRepository = $contentRepository;
        $this->session = $session;
    }

    public function listPage(PageRepository $pageRepository)
    {
        return $this->render('bo/page/list.html.twig', [
            'pages' => $pageRepository->findBy([], ['id' => 'DESC']),
        ]);
    }

    /**
     * @return mixed
     */
    public function index(
        PageRepository $pageRepository,
        TimelineRepository $timelineRepository,
        Request $request)
    {
        if (!$this->session->get('_locale')) {
            if ('en' === $request->getLocale()) {
                $this->session->set('_locale', 'us');
            } else {
                $this->session->set('_locale', $request->getLocale());
            }
        }

        $pages = $this->getDoctrine()->getRepository(Page::class)->findAll();
        $langs = $this->getDoctrine()->getRepository(Language::class)->findAll();

        $timelines = $timelineRepository->getUpdatesPerDay();

        $arrayTimelines = [];
        foreach ($timelines as $timeline) {
            $timeline['data'] = json_decode($timeline['jsonData']);
            $arrayTimelines[] = $timeline;
        }

        return $this->render('bo/dashboard.html.twig',
            [
                'page' => 'dashbord',
                'pages' => $pages,
                'langs' => $langs,
                'countPages' => $pageRepository->getCountPages(),
                'countPosts' => $pageRepository->count(['type' => 'post']),
                'timelines' => $arrayTimelines,
            ]
        );
    }

    /**
     * @return mixed
     */
    public function page(Request $request, $slug, $type = 0, SessionInterface $session, LangService $langService)
    {
        // TOOD FORCE LOCALE
        $session->set('_locale', 'fr');
        if (!$session->get('_locale_edit')) {
            $session->set('_locale_edit', 'fr');
        }

        $id = $request->request->get('id');
        //get all langue
        $langs = $this->getDoctrine()->getRepository(Language::class)->findAll();
        //get all pages
        $pages = $this->getDoctrine()->getRepository(Page::class)->getPages();

        //get all pages block
        $default_block = '';
        $default_page = $page = $this->getDoctrine()->getRepository(Page::class)->findOneBySlug($slug);

        /* TODO Type block
        if($type > 0){
            $default_block  = $block =  $this->getDoctrine()->getRepository(Block::class)->findByType($type);
        }
        */

        $locale = $request->getLocale();
        if ($session->get('_locale')) {
            $locale = $session->get('_locale');
        } else {
            $session->set('_locale', $request->getLocale());
        }

        if ($session->get('_locale_edit') && 'site' !== $slug) {
            $locale = $session->get('_locale_edit');
        }

        $blocks_page = $this->_getDataPage($page, $default_block, $langService->getCodeLanguage($session->get('_locale_edit')));

        $sliders = $this->getDoctrine()->getRepository(Block::class)->findByPageAndType($slug, 3); //type slider = 3

        foreach ($blocks_page  as $key => $b_p) {
            $b_p->json = json_decode($b_p->getjsonData(), true);
            if (true === $b_p->getBlock()->getSubBlock()) {
                foreach ($b_p->getPageBlock() as $pb) {
                    $pb->json = json_decode($pb->getjsonData(), true);
                }
            }
        }

        //get slide home
        if (3 == $type) {
            $list_block = $this->getDoctrine()->getRepository(Block::class)->findOneBy(['id' => 54, 'type' => 5], ['name' => 'ASC']);
        } else {
            $list_block = $this->getDoctrine()->getRepository(Block::class)->findBy(['type' => 5], ['name' => 'ASC']);
        }

        $blocks = $this->getDoctrine()->getRepository(Block::class)->findBy([], ['name' => 'ASC']);

        if ('site' == $slug) {
            $list_block = [];
        }

        return $this->render('bo/page.html.twig', [
            'page' => $slug,
            'default_page' => $default_page,
            'blocks_page' => $blocks_page,
            'block_page_id' => $id,
            'pages' => $pages,
            'sliders' => $sliders,
            'blocks' => $blocks,
            'list_block' => $list_block,
            'langs' => $langs,
        ]);
    }

    public function duplicatePage(
        Page $page,
        Request $request,
        SluggerInterface $slugger,
        SessionInterface $session,
        LanguageRepository $languageRepository,
        ContentRepository $contentRepository,
        LangService $langService)
    {
        if (!$request->get('page_name')) {
            return $this->redirectToRoute('bo');
        }

        $new = clone $page;
        $new->setName($request->get('page_name'));
        $new->setType(Page::PAGE_TYPE_PAGE);

        $localSession = $session->get('_locale');
        if ('en' === $localSession) {
            $localSession = 'us';
        }
        $currentLang = $languageRepository->findOneBy(['code' => $localSession]);
        $otherContentsPage = $contentRepository->getLangExist($currentLang->getId(), $page->getId());
        $codeNextLang = $langService->getLocaleByLanguageId($currentLang->getId());

        foreach ($page->getPageBlock() as $blockPage) {
            $newBlockPage = clone $blockPage;
            $new->addPageBlock($newBlockPage);
            $newBlockPage->setPage($new);
            $this->em->persist($newBlockPage);

            foreach ($blockPage->getPageBlock() as $childBlock) {
                $newBlockChild = clone $childBlock;
                $newBlockPage->addPageBlock($newBlockChild);
                $newBlockChild->setPageBlock($newBlockPage);
                $this->em->persist($newBlockChild);
            }

            $oldContent = $contentRepository->findOneBy(['pageBlock' => $blockPage]);

            if ($oldContent) {
                $newContent = clone $oldContent;
                $newContent->setLanguage($langService->getCodeLanguage($codeNextLang));
                $newContent->setPageblock($newBlockPage);
                $this->em->persist($newContent);
            }
        }

        $this->em->persist($new);
        $this->em->flush();

        $this->addFlash('success', 'Page dupliquée, vous êtes maintenant sur la page "'.$new->getName().'" !');

        return $this->redirectToRoute('bo_page_by_type', [
            'slug' => $slugger->slug($new->getName())->lower(),
            'type' => 2,
        ]);
    }

    public function newLangBlocks(
        int $langId,
        int $id,
        PageRepository $pageRepository,
        ContentRepository $contentRepository,
        LanguageRepository $languageRepository,
        SessionInterface $session,
        LangService $langService)
    {
        $page = $pageRepository->find($id);
        $contents = $contentRepository->getLangExist($langId, $page->getId());

        $session->set('_locale_edit', $langService->getLocaleByLanguageId($langId));

        if (empty($contents)) {
            // New page lang
            $localSession = $session->get('_locale');
            if ('en' === $localSession) {
                $localSession = 'us';
            }
            $currentLang = $languageRepository->findOneBy(['code' => $localSession]);
            $otherContentsPage = $contentRepository->getLangExist($currentLang->getId(), $page->getId());
            $codeNextLang = $langService->getLocaleByLanguageId($langId);

            foreach ($otherContentsPage as $otherContent) {
                $newContent = clone $otherContent;
                $newContent->setLanguage($langService->getCodeLanguage($codeNextLang));
                $this->em->persist($newContent);
            }

            $this->addFlash(
                'success',
                'Vous avez ajouté la langue '.$langService->getLocaleByLanguageId($langId).' "'.$page->getName().'" !'
            );
        } else {
            $this->addFlash(
                'success',
                'Edition de la page '.$page->getName().' en '.$langService->getLocaleByLanguageId($langId).''
            );
        }

        $this->em->flush();

        return $this->redirectToRoute('bo_page_by_type', [
            'slug' => $page->getSlug(),
            'type' => 2,
        ]);
    }

    public function removePage(Page $page)
    {
        foreach ($page->getPageBlock() as $pageBlock) {
            $contents = $this->getDoctrine()->getRepository(Content::class)->findBy(['pageBlock' => $pageBlock]);
            foreach ($contents as $content) {
                $this->em->remove($content);
            }
        }
        $this->em->remove($page);
        $this->em->flush();

        $this->addFlash('success', 'Page supprimée !');

        return $this->redirectToRoute('bo');
    }

    public function deactivePage(Page $page, SluggerInterface $slugger)
    {
        if ($page->getActive()) {
            $page->setActive(false);
            $message = 'Page désactivée !';
        } else {
            $page->setActive(true);
            $message = 'Page activée !';
        }

        $this->em->flush();

        $this->addFlash('success', $message);

        return $this->redirectToRoute('bo_page_by_type', [
            'slug' => $slugger->slug($page->getName())->lower(),
            'type' => 2,
        ]);
    }

    public function subscriber()
    {
        $subscribers = $this->getDoctrine()->getRepository(Newsletter::class)->findAll();
        $pages = $this->getDoctrine()->getRepository(Page::class)->findAll();

        return $this->render('bo/blocks/_subscriber.html.twig', [
            'template' => '_subscriber',
            'page' => 'Subscriber',
            'subscriber' => $subscribers,
            'pages' => $pages,
        ]);
    }

    public function footer($slug)
    {
        $footer = $this->getDoctrine()->getRepository(Block::class)->findByName('footer');
        if (empty($footer)) {
        }

        return $this->render('bo/'.$slug.'.html.twig', [
            'page' => $slug,
        ]);
    }

    public function slider($slug)
    {
        return $this->render('bo/'.$slug.'.html.twig', [
            'page' => $slug,
        ]);
    }

    public function language(Request $request, $action = '')
    {
        $language_form = '';
        $block = '_lang';
        //action edit remove add
        if ('' != $action) {
            $lang = new Language();
            $form = $this->createForm(LanguageType::class, $lang);
            $block = '_lang-form';
            $language_form = $form->createView();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $datas = $form->getData();

                $this->em->persist($datas);
                $this->em->flush();
            }
        }

        $langs = $pages = $this->getDoctrine()->getRepository(Language::class)->findAll();

        $pages = $this->getDoctrine()->getRepository(Page::class)->findAll();

        return $this->render('bo/lang.html.twig',
            [
                'page' => 'dashbord',
                'pages' => $pages,
                'langs' => $langs,
                'language_form' => $language_form,
                'block' => $block,
            ]
        );
    }

    protected function _getDataPage($page, $block = '', string $langId)
    {
        $contents = $this->contentRepository->getLangExist($langId, $page->getId());

        /*
        if(!empty($block)){
            $page_blocks = $this
                ->getDoctrine()
                ->getRepository(PageBlock::class)
                ->findBy(array(
                    'page' =>$page,
                    'block' => $block
                ),
                    array('itemOrder' =>'ASC')

            );
        }else{

            $page_blocks = $this
                ->getDoctrine()
                ->getRepository(PageBlock::class)
                ->findBy(
                    array('page' => $page ),
                    array('itemOrder' =>'ASC')
            );
        }*/

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

        return $arrayPageBlocks;
    }

    protected function _getDataPageByBlock($page)
    {
        $page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->findByPage($page);

        return $page_blocks;
    }
}
