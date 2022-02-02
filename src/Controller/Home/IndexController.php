<?php
/**
 * Created by PhpStorm.
 * User: yazidneghiche
 * Date: 23/03/2021
 * Time: 20:26.
 */

namespace App\Controller\Home;

use App\Entity\Block;
use App\Entity\Newsletter;
use App\Entity\Page;
use App\Entity\PageBlock;
use App\Form\NewsLetterType;
use App\Form\DayroomType;
use App\Helper as hlp;
use App\Repository\ContentRepository;
use App\Repository\MenuRepository;
use App\Repository\PageBlockRepository;
use App\Service\LangService;
use App\Service\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @var array
     */
    private $classe = [
        'contact' => \App\Form\ContactType::class,
        'gifts' => \App\Form\GiftType::class,
        'gift-vouchers' => \App\Form\GiftType::class,
        'wedding' => \App\Form\GiftType::class,
        'meeting-room' => \App\Form\ContactType::class,
        'bowling-room' => \App\Form\ContactType::class,
        'conferences' => \App\Form\GiftType::class,
        'class-reunion' => \App\Form\GiftType::class,
        'baptism-and-communion' => \App\Form\GiftType::class,
        'birthday' => \App\Form\GiftType::class,
        'our-reception-rooms' => \App\Form\ContactType::class,
        'small-rooms' => \App\Form\ContactType::class,
        'medium-rooms' => \App\Form\ContactType::class,
        'big-room' => \App\Form\ContactType::class,
        'special-offers' => \App\Form\DayroomType::class,
    ];

    /**
     * page -> entity form.
     *
     * @var array
     */
    public $page_form = [
        'contact' => ['contact'],
        'gifts' => ['gift'],
        'gift-vouchers' => ['gift'],
        'wedding' => ['gift'],
        'meeting-room' => ['contact'],
        'bowling-room' => ['contact'],
        'conferences' => ['gift'],
        'class-reunion' => ['gift'],
        'baptism-and-communion' => ['gift'],
        'birthday' => ['gift'],
        'our-reception-rooms' => ['contact'],
        'small-rooms' => ['contact'],
        'medium-rooms' => ['contact'],
        'big-room' => ['contact'],
        'special-offers' => ['special-offers'],
    ];

    /**
     * @var LangService
     */
    private $langService;

    /**
     * @var ContentRepository
     */
    private $contentRepository;

    public function __construct(LangService $langService, ContentRepository $contentRepository)
    {
        $this->langService = $langService;
        $this->contentRepository = $contentRepository;
    }

    /**
     * @param $slug
     * @param string $id
     * @param Request $request
     * @param MenuRepository $menuRepository
     * @param PageBlockRepository $pageBlockRepository
     * @param LangService $langService
     * @param SessionInterface $session
     * @return Response
     *
     * @Route("/{slug}", name="front_index_page", defaults={"slug": "/"})
     */
    public function page($slug, $id = '', Request $request, MenuRepository $menuRepository, LangService $langService)
    {
        $page = $this->getDoctrine()->getRepository(Page::class)->findBy(['slug' => $slug]);

        if (!empty($page)) {
            $lang = $this->langService->getCodeLanguage($request->getLocale());

            $array = [];
            $datas['slug'] = $slug;
            $datas['locale'] = $request->getLocale();
            $site = $this->_getDataSite($langService->getCodeLanguage($lang));
            if(!empty($site)){
                $datas['header'] = $site[0]->datas;
                if(isset( $site[1]))
                    $datas['newsletter_block'] = $site[1]->datas;
            }


            // Footer components
            // TODO Footer
          /*  if (2 === $lang) {
                $site = $pageBlockRepository->find(646);
                $datas['footer']['links'] = $site->getPageBlock()[0]->json;
                $datas['footer']['logos'] = $site->getPageBlock()[1]->json;
                $datas['footer']['privacy_links'] = $site->getPageBlock()[2]->json;
                $datas['footer']['location'] = $site->getPageBlock()[3]->json;
                $datas['footer']['social'] = $site->getPageBlock()[4]->json ?? [];
            } elseif (3 === $lang) {
                $site = $pageBlockRepository->find(648);
                $datas['footer']['links'] = $site->getPageBlock()[0]->json;
                $datas['footer']['logos'] = $site->getPageBlock()[1]->json;
                $datas['footer']['privacy_links'] = $site->getPageBlock()[2]->json;
                $datas['footer']['location'] = $site->getPageBlock()[3]->json;
                $datas['footer']['social'] = $site->getPageBlock()[4]->json ?? [];
            } else {
                $datas['footer']['links'] = $site[5]->getPageBlock()[0]->json;
                $datas['footer']['logos'] = $site[5]->getPageBlock()[1]->json;
                $datas['footer']['privacy_links'] = $site[5]->getPageBlock()[2]->json;
                $datas['footer']['location'] = $site[5]->getPageBlock()[3]->json;
                $datas['footer']['social'] = $site[5]->getPageBlock()[4]->json ?? [];
            }*/

            $datas['blocks'] = $this->_getDataPage($slug, $request->getLocale(), $page[0]->getId());

            if (empty($datas['blocks'])) {
                return new Response(
                    $this->render('bundles/TwigBundle/Exception/error404.html.twig'),
                    404
                );
            }

            //get Header
            if(!empty( $this->_getDataHeader($slug)))
                $datas['header'] = $this->_getDataHeader($slug)[0]->datas;

            $menu = $menuRepository->findOneBy(['name' => 'main_menu']);
            $datas['menus'] = json_decode($menu->getJsonData());
            $datas['metas'] = [];

            foreach ($datas['blocks'] as $key => $dt) {
                if (isset($dt->datas) && array_key_exists('meta_title', $dt->datas)) {
                    $datas['metas'] = $dt->datas;
                } else {
                    $sub = [];
                    if (true == $dt->getBlock()->getSubBlock()) {
                        foreach ($dt->getPageBlock() as $children) {
                            $sub[] = $children->json;
                        }
                        $dt->datas['slider'] = $sub;
                    }
                    $template = $dt->getBlock()->getPath();
                    $array['blocks'][] = ['data' => $dt->datas, 'template' => $template];
                }
            }

            unset($datas['blocks']);
            $datas = array_merge($datas, $array);
        } else {

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

            if ($classe === 'special-offers') {
                $classe = 'dayroom';
            }
            $model = 'App\\Entity\\'.ucfirst($classe);

            $model = new $model();

            $form = $this->createForm($this->classe[$slug], $model,
                [
                    'action' => $this->generateUrl('ajax_form'),
                    'method' => 'POST',
                    'slug' => $slug ?? null,
                ]
            );

            $datas['form'] = $form->createView();
        }

        //newsletter
        $newsLetter = new NewsLetter();

        $newsletter_form = $this->createForm(NewsletterType::class, $newsLetter,
            [
                'action' => $this->generateUrl('ajax_form'),
                'method' => 'POST',
            ]
        );

        $datas['newsletter_form'] = $newsletter_form->createView();

        if (!empty($page)) {
            $hasNewsletter = $page[0]->getHasNewsletter();
            $datas['has_newsletter'] = $hasNewsletter;
        }

        return $this->render('home/page/_generic-page.html.twig', $datas);
    }

    /**
     * @param $page
     */
    protected function _getDataPage(string $slug, string $locale, int $pageId)
    {
        $lang = $this->langService->getCodeLanguage($locale);
        $contents = $this->contentRepository->getLangExist($lang, $pageId);

        //$page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->getbyNameByBlockType($slug, 2);

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

    protected function _getDataSite(int $locale = null)
    {
        $page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->getByPageNameBy('site', $locale);

        return $this->_getData($page_blocks);
    }

    protected function _getDataHeader($slug)
    {
        $page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->getbyNameByBlockType($slug, 1);

        return $this->_getData($page_blocks);
    }

    protected function _getDataFooter($slug)
    {
        $page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->getbyNameByBlockType($slug, 5);

        return $this->_getData($page_blocks);
    }

    protected function _getDayliMessage()
    {
        return $this->getDoctrine()->getRepository(Block::class)->findByType(6);
    }

    /*
     * 03/11/2021 update Manage Preview for draft
     */
    protected function _getData($page_blocks)
    {
        $request = Request::createFromGlobals();

        foreach ($page_blocks as $key => $pb) {
            $jsonDatas = $request->get('preview') ? $pb->getJsonDataPreview() : $pb->getJsonData();

            $pb->datas = json_decode($jsonDatas ?? $pb->getJsonData(), true);
            if (true === $pb->getBlock()->getSubBlock()) {
                foreach ($pb->getPageBlock() as $p_b) {
                    $p_b->json = json_decode($p_b->getjsonData(), true);
                }
            }
        }

        return $page_blocks;
    }

    /**
     * @Route("/offer/send-form", name="front_ajax_valid_offer", methods={"POST"})
     */
    public function validOfferForm(Request $request, Mail $mail)
    {
        $datas = $request->request->all();

        if (isset($datas['gift']) && $datas['gift'] && $datas['gift']['amount']) {


            $mail->sendOffer($datas['gift']);

            return $this->json([
                'status' => 'ok',
                'message' => $link,
            ], Response::HTTP_OK);

        } elseif (isset($datas['dayroom'])) {

            $mail->sendDayroom($datas['dayroom']);

            return $this->json( [
                'slug' => 'special-offers',
                'type' => 2
            ]);
        }

    }

    /**
     * @Route("/send/newsletter", name="index_home_send_newsletter")
     */
    public function sendNewsletter(Request $request, Mail $mail)
    {
        dd($request->request->all());
    }

    public function redirectOldUrl(string $slug = null)
    {
        $currentSlug = 'home';
        switch ($slug) {
            case 'st_sylvestre_2021':
                $currentSlug = 'saint-sylvestre';
                break;
            case 'offres-sejours':
                $currentSlug = 'offre-promotionnelle-en-chambre';
                break;
            case 'noel-2021':
                $currentSlug = 'noel';
                break;
            case 'anniversaires':
                $currentSlug = 'birthday';
                break;
            case 'appartements_villa':
                $currentSlug = 'la-villa';
                break;
            case 'bar-lounge':
                $currentSlug = 'lounge-bar';
                break;
            case 'beaute_spa_fr':
                $currentSlug = 'wellness-area';
                break;
            case 'biketours-2':
                $currentSlug = 'bed-bike';
                break;
            case 'bons-cadeaux':
                $currentSlug = 'gift-vouchers';
                break;
            case 'brochures':
                $currentSlug = 'brochures';
                break;
            case 'carte_restaurant':
                $currentSlug = 'la-veranda-restaurant';
                break;
            case 'chambre-comfort':
                $currentSlug = 'the-comfort-room';
                break;
            case 'chambres':
                $currentSlug = 'rooms';
                break;
            case 'cocktail-happy-hours':
                $currentSlug = 'lounge-bar';
                break;
            case 'conferences':
                $currentSlug = 'conferences';
                break;
            case 'contactez-nous':
                $currentSlug = 'contact';
                break;
            case 'detente-loisirs-fr':
                $currentSlug = 'spa-and-leisure';
                break;
            case 'evenements':
                $currentSlug = 'events';
                break;
            case 'fitness_fr':
                $currentSlug = 'leisure-and-sports';
                break;
            case 'grandes-salles':
                $currentSlug = 'big-room';
                break;
            case 'hotel_fr':
                $currentSlug = 'about-us';
                break;
            case 'jeu-de-quilles':
                $currentSlug = 'bowling-room';
                break;
            case 'les-salles':
                $currentSlug = 'wedding';
                break;
            case 'location-de-salles':
                $currentSlug = 'our-reception-rooms';
                break;
            case 'mariages':
                $currentSlug = 'wedding';
                break;
            case 'package-decouverte':
                $currentSlug = 'package-decouverte';
                break;
            case 'package-romantique':
                $currentSlug = 'package-romantique';
                break;
            case 'package-sportif':
                $currentSlug = 'package-sportif';
                break;
            case 'package_gastronomique':
                $currentSlug = 'package-gastronomique';
                break;
            case 'package_wellness':
                $currentSlug = 'wellness-area';
                break;
            case 'petites-salles':
                $currentSlug = 'small-rooms';
                break;
            case 'quilles':
                $currentSlug = 'bowling-room';
                break;
            case 'pour-vous-faire-une-idee':
                $currentSlug = 'wedding';
                break;
            case 'rallye':
                $currentSlug = 'rallye';
                break;
            case 'randonnee':
                $currentSlug = 'leisure-and-sports';
                break;
            case 'relaxation-leisure':
                $currentSlug = 'spa-and-leisure';
                break;
            case 'relaxation-fitness':
                $currentSlug = 'wellness-area';
                break;
            case 'restaurant-la-veranda':
                $currentSlug = 'la-veranda-restaurant';
                break;
            case 'restaurant-la-veranda-2':
                $currentSlug = 'la-veranda-restaurant';
                break;
            case 'restaurant_bar':
                $currentSlug = 'restaurant-and-bar';
                break;
            case 'salles-de-taille-moyenne':
                $currentSlug = 'medium-rooms';
                break;
            case 'st-valentin':
                $currentSlug = 'st-valentin';
                break;
            case 'appartements':
                $currentSlug = 'apartements';
                break;
            case 'tres-grande-salle':
                $currentSlug = 'big-room';
                break;
            case 'very-large-room':
                $currentSlug = 'events';
                break;
            case 'environnement':
                $currentSlug = 'environnement';
                break;
            case 'suggestions-du-chef':
                $currentSlug = 'suggestions-du-mois';
                break;
            case 'guide-client':
                $currentSlug = 'guide-client';
                break;
//yaz adds
            case 'nuit-romantique-parc-hotel-alvisse':
                $currentSlug = 'package-romantique';
                break;
            case 'offre-promotionnelle-en-chambre':
                $currentSlug = 'special-offers';
                break;
            case 'menu-de-mariage':
                $currentSlug = 'wedding';
                break;
            case 'gdpr_fr':
                $currentSlug = 'gdpr';
                break;
            case 'menu-du-dimanche':
                return $this->redirect('/uploads/TV-Channels-61d31b37718dc.pdf');
                break;
            case 'TV-Channels.pdf':
                return $this->redirect('/uploads/TV-Channels-61d31b37718dc.pdf');
                break;
            case 'carte_menu_veranda_current.pdf':
                return $this->redirect('/uploads/carte-menu-veranda-current-2-61bb781fea955.pdf');
                break;
            case 'charte-de-qualite-environnementale':
                return $this->redirect('/uploads/Charte-Ecolo-2021-pour-site-61951bde89894.pdf');
                break;
        }

        return $this->redirectToRoute('app_page', ['slug' => $currentSlug]);
    }
}
