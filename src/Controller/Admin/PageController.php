<?php

namespace App\Controller\Admin;

use App\Entity\Block;
use App\Entity\User;
use App\Entity\BlockChildren;
use App\Entity\Content;
use App\Entity\Language;
use App\Entity\Page;
use App\Entity\PageBlock;
use App\Entity\Timeline;
use App\Form\PageType;
use App\Repository\ContentRepository;
use App\Repository\LanguageRepository;
use App\Repository\PageRepository;
use App\Service\FileUploader;
use App\Service\LangService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

//helper

/**
 * Class PageController.
 */
class PageController extends AbstractController
{
    /**
     * @param null $id
     */
    public function index($id = null): Response
    {
        return $this->render('admin/page/index.html.twig', []);
    }

    /**
     * Initial page
     * get fisrst of list.
     */
    public function add(Request $request): Response
    {
        $blocks = $this->getDoctrine()->getRepository(Block::class)->findAll();
        $pages = $this->getDoctrine()->getRepository(Page::class)->findAll();

        $page = new Page();
        $form = $this->createForm(PageType::class, $page,
            [
                'action' => $this->generateUrl('admin_page_new'),
                'method' => 'POST',
            ]
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $page = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($page);
            $entityManager->flush();

            //Get id
            $page_id = $page->getId();
            $pages = $this->getDoctrine()->getRepository(Page::class)->findAll();
        }
        $default_page = $pages[0];
        $default_page_id = $pages[0]->getId();
        $blocks_page_list = $this->getDoctrine()->getRepository(PageBlock::class)->findBy(['page' => $default_page_id]);

        $list_block = $this->getDoctrine()->getRepository(Block::class)->findByType(5);

        //Get block
        $blocks_page = $this->_getDataPage($default_page);
        // $block_page_id = $blocks_page[0]->getId();
        if (!empty($blocks_page)) {
            foreach ($blocks_page  as $key => $b_p) {
                $b_p->json = json_decode($b_p->getjsonData(), true);
                if (true === $b_p->getBlock()->getSubBlock()) {
                    foreach ($b_p->getPageBlock() as $pb) {
                        $pb->json = json_decode($pb->getjsonData(), true);
                    }
                }
            }
        }

        return $this->render('admin/page/index.html.twig', [
            'form' => $form->createView(),
            'blocks' => $blocks,
            'pages' => $pages,
            'default_page' => $default_page,
            'default_page_id' => $default_page_id,
            'blocks_page' => $blocks_page,
            'blocks_page_list' => $blocks_page_list,
            'list_block' => $list_block,
           // 'block_page_id' =>$block_page_id
        ]);
    }

    /**
     * Add data to associted table page block.
     */
    public function block(Request $request, FileUploader $fileUploader, SessionInterface $session): Response
    {
        if (!$request->get('sub_block_id') && !$request->get('block_page_id') && !$request->get('lang_block')) {
            return new JsonResponse([
                'status' => 'Error',
                'response' => 'Missing parameters',
            ], Response::HTTP_FOUND);
        }

        $language = null;
        if ($request->get('locale')) {
            $language = $this->getDoctrine()->getRepository(LanguageRepository::class)->findOneBy(['code' => $request->get('locale')]);
        }

        if (!empty($_POST['sub_block_id'])) {
            $context_record = $this->getDoctrine()->getRepository(BlockChildren::class)->find($_POST['sub_block_id']);
        } else {
            $block_page_id = $_POST['block_page_id'];
            if ($language) {
                $context_record = $this->getDoctrine()->getRepository(PageBlock::class)->findOneBy(['id' => $block_page_id, 'language' => $language]);
            } else {
                $context_record = $this->getDoctrine()->getRepository(PageBlock::class)->find($block_page_id);
            }
        }

        $array = [];
        $checkbox_value = ['on' => 1, 'off' => 0];

        foreach ($_POST as $key => $value) {
            if ('on' == $value || 'off' == $value) {
                $array[strtolower($key)] = $checkbox_value[$value];
            } else {
                $array[strtolower($key)] = $value;
            }
        }

        $files = $request->files;
        $fileName = '';

        $locale = $request->get('lang_block');

        /*
        if ($session->get('_locale_edit')) {
            $locale = $session->get('_locale_edit');
        } elseif ($session->get('_locale')) {
            $locale = $session->get('_locale');
        }*/

        /*
        if(empty($_SESSION['lang'])){
            $_SESSION['lang'] = 'fr';
        }
        */

        if (!empty($files)) {
            foreach ($files  as $key => $file) {
                $i = 0;
                $hidden_array = $key.'_hidden_file';
                foreach ($file  as $k => $obj) {
                    if (!is_null($obj) && '' != $value) {
                        $fileName = $fileUploader->upload($obj);
                        $array[strtolower($key)][] = $fileName;
                    }
                    ++$i;
                }

                if (!empty($array[$hidden_array])) {
                    foreach ($array[$hidden_array] as $img) {
                        if (!empty($img)) {
                            $array[strtolower($key)][] = $img;
                        }
                    }
                }
                unset($array[$hidden_array]);
            }
        }

        $json = json_encode($array);

        if (!$request->get('draft')) {
            $context_record->setJsonData($json);
        }
        $context_record->setJsonDataPreview($json);

        $entityManager = $this->getDoctrine()->getManager();

        if(empty($this->getUser())){
            $user = $this->getDoctrine()->getRepository(User::class)->find(1);
            //$this->getUser() ;
        }else{
            $user =  $this->getUser();
        }

        // Add timeline
        if ($context_record instanceof PageBlock) {
            $timeline = new Timeline();
            $timeline->setUser($user);
            $timeline->setPageBlock($context_record);
            $timeline->setUpdatedAt(new \DateTime());
            $entityManager->persist($timeline);
        }

        $entityManager->flush();
        if(empty($locale)){
            $locale = 'fr';
        }
        $localeToSearch = $locale;

        if ('en' === $localeToSearch) {
            $localeToSearch = 'us';
        }

        if (is_null($localeToSearch)) {
            $localeToSearch = $session->get('_locale_edit');
        }
       
        $lang = $this->getDoctrine()->getRepository(Language::class)->findOneByCode($localeToSearch);

        if (!empty($_POST['sub_block_id'])) {
            $content = $this->getDoctrine()->getRepository(Content::class)->findOneBy(
                [
                    'blockChildren' => $_POST['sub_block_id'],
                    'language' => $lang,
                ]
            );

            if (empty($content)) {
                $content = new Content();
                $content->setBlockChildren($context_record);
                $content->setTarget(2);
            }

        } else {

            $content = $this->getDoctrine()->getRepository(Content::class)->findOneBy(
                [
                        'pageBlock' => $block_page_id,
                        'language' => $lang,
                ]
            );

            if (empty($content)) {
                $content = new Content();
                $content->setPageBlock($context_record);
                $context_record->addContent($content);
                $content->setTarget(1);
            } else {
                $content->setPageBlock($context_record);
                $context_record->addContent($content);
            }
        }
        
        // Publish or draft
        if ($content) {
            if ($request->get('draft')) {
                $content->setJsonPreview($json);
            } else {
                $content->setJson($json);
            }

            $content->setLanguage($lang->getId());

            $entityManager->persist($content);
        }

        $entityManager->flush();

        return new JsonResponse([
                'success' => true,
                'page_name' => 'Page',
            ]
        );
    }

    public function getAjaxListBlock(Request $request): Response
    {
        $block_id = $request->request->get('block_id');

        $block = $this->getDoctrine()->getRepository(Block::class)->find($block_id);

        return $this->render('admin/ajax/_form-block.html.twig', [
            'blocks' => $block,
            'items' => $block->block,
            'id' => $block_id,
        ]);
    }

    /**
     * @param $page
     */
    public function getAjaxListBlockFromPage(Request $request, $page): Response
    {
        $page = $this->getDoctrine()->getRepository(Page::class)->find($page);
        $blocks_page_list = $this->getDoctrine()->getRepository(PageBlock::class)->find($page);

        return $this->render('admin/ajax/_form-block.html.twig', [
            'blocks_page_list' => $blocks_page_list,
        ]);
    }

    /**
     * @return mixed
     */
    public function getPageEntity(int $id, PageRepository $pageRepository)
    {
        $page = $pageRepository->getOnePage($id);

        if (!$page) {
            return $this->json([
                'status' => 'Not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return $this->json([
            'page' => $page,
            'status' => 'ok',
        ], Response::HTTP_OK);
    }

    public function editNewsletterPage(Page $page, Request $request)
    {
        if (null === $request->get('newsletter')) {
            return $this->json([
                'status' => 'Missing parameter',
            ], Response::HTTP_NOT_FOUND);
        }

        $page->setHasNewsletter($request->get('newsletter'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->json([
            'status' => 'ok',
        ], Response::HTTP_OK);
    }

    /**
     * @param $page
     */
    public function getAjaxDataPage(Request $request, $id): Response
    {
       // $id = $request->request->get('id');

        $default_page = $page = $this->getDoctrine()->getRepository(Page::class)->find($id);
        $blocks_page = $this->_getDataPage($page);
        $default_page_id = '';

        if (!empty($blocks_page)) {
            $default_page_id = $blocks_page[0]->getId();

            foreach ($blocks_page  as $key => $b_p) {
                $b_p->json = json_decode($b_p->getjsonData(), true);
                if (true === $b_p->getBlock()->getSubBlock()) {
                    foreach ($b_p->getPageBlock() as $pb) {
                        $pb->json = json_decode($pb->getjsonData(), true);
                    }
                }
            }
        }

        $list_block = $this->getDoctrine()->getRepository(Block::class)->findByType(5);

        return $this->render('admin/ajax/_block-detail-page.html.twig', [
            'default_page' => $default_page,
            'blocks_page' => $blocks_page,
            'block_page_id' => $default_page_id,
            'list_block' => $list_block,
        ]);
    }

    /**
     * @param $page
     * @param $block
     *
     * @return JsonResponse
     *
     * @throws \TypeError
     */
    public function removeBlock(Request $request, $page, $block, ContentRepository $contentRepository, LangService $langService)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $blockpagge = $request->get('blockpage');
        $lang = $request->get('lang');
        if(empty($lang)) $lang = 'fr';

        $lang = $langService->getCodeLanguage($lang);

        $block = $this->getDoctrine()->getRepository(PageBlock::class)->findOneBy(['page' => $page, 'id' => $blockpagge]);

        $contents = $contentRepository->findBy(['pageBlock' => $block, 'language' => $lang]);

        foreach ($block->getPageBlock() as $children) {
            $block->removePageBlock($children);
            $entityManager->remove($children);
        }

        $entityManager->flush();
        foreach ($contents as $content) {
            $block->removeContent($content);
            $content->setPageBlock(null);
            $entityManager->remove($content);
        }
        $entityManager->flush();
        try {
            $entityManager->remove($block);
            $entityManager->flush();
        } catch (\Exception $e) {
            return new JsonResponse(json_encode(['success' => $e->getMessage()]));
        }

        return new JsonResponse(json_encode(['success' => true]));
    }

    public function orderBlock(Request $request)
    {
        $data = $request->request->get('json');
        //return new JsonResponse(json_encode(array('success' => $data)));
        foreach ($data as $key => $value) {
            $block = $this->getDoctrine()->getRepository(PageBlock::class)->find($value);
            $block->setItemOrder($key);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($block);
            $entityManager->flush();
        }

        return new JsonResponse(json_encode(['success' => true]));
    }

    /**
     * @param $page
     */
    protected function _getDataPage($page)
    {
        $page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->findByPage($page);

        return $page_blocks;
    }
}
