<?php

namespace App\Controller\Bo\Admin;

use App\Entity\Block;
use App\Entity\BlockChildren;
use App\Entity\BlockItem;
use App\Entity\Content;
use App\Entity\Item;
use App\Entity\Page;
use App\Entity\PageBlock;
use App\Form\BlockType;
use App\Repository\LanguageRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockController extends AbstractController
{
    public function index(Request $request): Response
    {
        $allBlocks = $this->getBlocksPath();
        $blockPaths = $allBlocks['block_paths'];
        $blocks = $allBlocks['blocks'];

        $block = new Block();

        $form = $this->createForm(BlockType::class, $block,
            [
                'action' => $this->generateUrl('admin_block_form'),
                'method' => 'POST',
            ]
        );

        return $this->render('bo/super_admin/block/index.html.twig', [
            'form' => $form->createView(),
            'blocks' => $blocks,
            'block_paths' => $blockPaths,
        ]);
    }

    /**
     * @param null $id
     */
    public function edit(Request $request, $id = null): Response
    {
        $allBlocks = $this->getBlocksPath();
        $blockPaths = $allBlocks['block_paths'];
        $blocks = $allBlocks['blocks'];

        $block = $this->getDoctrine()
            ->getRepository(Block::class)
            ->find($id);

        $blockItems = $this->getDoctrine()
            ->getRepository(BlockItem::class)
            ->findByBlock($id);

        $items = $this->getDoctrine()
            ->getRepository(Item::class)
            ->findAll();

        $form = $this->createForm(BlockType::class, $block,
            [
                'action' => $this->generateUrl('admin_block_form'),
                'method' => 'POST',
            ]
        );

        $array_items = [];
        foreach ($blockItems as $b_i) {
            $array_items[$b_i->getId()] = $b_i->getItem();
        }

        return $this->render('bo/super_admin/block/edit.html.twig', [
            'form' => $form->createView(),
            'array_items' => $array_items,
            'blockItems' => $blockItems,
            'items' => $items,
            'id' => $id,
            'blocks' => $blocks,
            'block_paths' => $blockPaths,
            'block' => $block,
        ]);
    }

    /**
     * remove block (in cascade ?)
     *
     * @param $id
     */
    public function ajaxRemove(Request $request, $id): Response
    {
        $block = $this->getDoctrine()->getRepository(Block::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();

        if (!empty($block)) {
            $blockitem = $this->getDoctrine()->getRepository(BlockItem::class)->findOneBy(['block' => $id]);
            if (!empty($blockitem)) {
                $entityManager->remove($blockitem);
                $entityManager->flush();
            }

            $pageBlock = $this->getDoctrine()->getRepository(PageBlock::class)->findOneBy(['block' => $id]);

            if (!empty($pageBlock)) {
                $content = $this->getDoctrine()->getRepository(Content::class)->findOneBy(['pageBlock' => $pageBlock->getId()]);

                if (!empty($content)) {
                    $entityManager->remove($content);
                    $entityManager->flush();
                }

                $entityManager->remove($pageBlock);
                $entityManager->flush();
            }

            $block = $this->getDoctrine()->getRepository(Block::class)->find($id);
            $entityManager->remove($block);
            $entityManager->flush();
        }

        return new JsonResponse(['succes' => 'ok']);
    }

    public function ajaxNewItem(Request $request): Response
    {
        $item_id = $request->request('item_id');

        $item = $this->getDoctrine()
            ->getRepository(Item::class)
            ->find($item_id);

        if (!$item) {
            throw $this->createNotFoundException('No item found for id '.$item_id);
        }

        if ($request->isXmlHttpRequest()) {
            $jsonData = json_encode($item);
        } else {
            $jsonData = ['erro' => 'problem'];
        }

        return new JsonResponse($jsonData);
    }

    public function ajaxAddSubBlock(Request $request): Response
    {
        $page_block_id = (int) $request->request->get('bp');
        $blockId = (int) $request->request->get('block');

        $pageBlock = $this->getDoctrine()->getRepository(PageBlock::class)->find($page_block_id);
        $block = $this->getDoctrine()->getRepository(Block::class)->find($blockId);

        $newBlockChildren = new BlockChildren();
        $newBlockChildren->setPageBlock($pageBlock);
        $newBlockChildren->setBlock($block);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($newBlockChildren);
        $entityManager->flush();

        //$blockChildren  = $this->getDoctrine()->getRepository(BlockChildren::class)->find( $blockChildren->getId() );
        //$blockChildren = $this->getDoctrine()->getRepository(BlockChildren::class)->getBlocksChildrenByBlockId($block->getId());

        return $this->render('bo/super_admin/ajax/_sub-block.html.twig', [
            'block_children' => $newBlockChildren,
        ]);
    }

    public function ajaxRemSubBlock(Request $request, EntityManagerInterface $em): Response
    {
        $block_id = $request->request->get('id');
        $blockChildren = $this->getDoctrine()->getRepository(BlockChildren::class)->find($block_id);

        $content = $this->getDoctrine()->getRepository(Content::class)->findOneBy(['blockChildren' => $blockChildren->getId()]);

        if ($content) {
            $content->setBlockChildren(null);
            $em->remove($content);
        }

        $em->remove($blockChildren);
        $em->flush();

        return new JsonResponse(['succes' => 'ok']);
    }

    public function ajaxListItem(Request $request): Response
    {
        $items = $this->getDoctrine()->getRepository(Item::class)->findAll();

        if (!$items) {
            throw $this->createNotFoundException('No items found ');
        }

        $array = [];
        if ($request->isXmlHttpRequest()) {
            foreach ($items as $item) {
                $array[] = ['id' => $item->getId(), 'value' => $item->getHtmlName()];
            }
        }

        return $this->render('bo/super_admin/ajax/_list-items.html.twig', [
            'items' => $array,
        ]);
    }

    public function ajaxForm(Request $request, FileUploader $fileUploader): Response
    {
        //Get datas

        $item_datas = $request->request;
        $block_datas = $request->request->get('block');
        $subBlock = false;
        if ($request->files->get('block')['image']) {
            $file = $request->files->get('block')['image'];
            $fileName = $fileUploader->upload($file);
        }

        $entityManager = $this->getDoctrine()->getManager();

        //update
        if (!empty($request->request->get('block_id'))) {
            $id = $request->request->get('block_id');
            $block = $this->getDoctrine()->getRepository(Block::class)->findOneById($id);
        } else {
            $block = new Block(); //create
        }

        if (!empty($block_datas['subBlock'])) {
            $subBlock = $block_datas['subBlock'];
        }
        $block->setName($block_datas['name']);
        $block->setType($block_datas['type']);
        $block->setPath($block_datas['path']);
        $block->setSubBlock($subBlock);

        if (!empty($fileName)) {
            $block->setImage($fileName);
        }

        $entityManager->persist($block);

        $entityManager->flush();

        //Next : retrieves items id
        $i = 1;

        foreach ($item_datas  as $key => $data) {
            if ('block' == $key) {
                continue;
            }

            //Get item bject
            $item = $this->getDoctrine()->getRepository(Item::class)->find($data);

            $blockItem = new BlockItem();
            $entityManager = $this->getDoctrine()->getManager();
            if (!empty($item)) {
                $blockItem->setItem($item);
                $blockItem->setBlock($block);
                $blockItem->setItemOrder($i);
                $entityManager->persist($blockItem);
                $entityManager->flush();
            }

            $i++;
        }

        return new JsonResponse(['success' => 'ok']);
    }

    /**
     * @param $id
     */
    public function generatBlockForm(Request $request, LanguageRepository $languageRepository): Response
    {
        //get bock
        $block_id = $request->request->get('block_id');
        $page_id = $request->request->get('page_id');
        $locale = $request->request->get('locale');

        try {
            $items = $this->getDoctrine()->getRepository(BlockItem::class)->findByBlock($block_id);
        } catch (\Exception $e) {
            return new JsonResponse(json_encode(['error' => $e]));
        }

        $block = $this->getDoctrine()->getRepository(Block::class)->find($block_id);
        $page = $this->getDoctrine()->getRepository(Page::class)->find($page_id);

        $language = null;
        if ($locale) {
            $language = $languageRepository->findOneBy(['code' => $locale]);
        }

        //ADD NEW BLOCK IN PAGE BLOCK
        $page_block = new PageBlock();
        $page_block->setPage($page);
        $page_block->setBlock($block);
        $page_block->setLanguage($language);
        $page_block->setItemOrder(random_int(100, 1000));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($page_block);
        $entityManager->flush();

        $block_page_id = $page_block->getId();

        //create pageblock
        return $this->render('bo/super_admin/ajax/_block-page.html.twig', [
            'items' => $items,
            'block' => $block,
            'block_page_id' => $block_page_id,
            'block_page' => $page_block,
            'list_block' => $this->getDoctrine()->getRepository(Block::class)->findBy(['type' => 5], ['name' => 'ASC']),
        ]);
    }

    /**
     * @param $items
     *
     * @return Response
     */
    protected function _formatItemsBloc($items)
    {
        $array = [];

        foreach ($items as $item) {
            $array[$item->getid()] = [
                'id' => $item->getBlock()->getId(),
                'name' => $item->getBlock()->getName(),
            ];
            $array[$item->getid()]['items'][] = $item->getItem();
        }

        return $array;
    }

    private function getBlocksPath()
    {
        $block_paths = scandir($this->getParameter('block_directory'), 1);
        array_pop($block_paths);
        array_pop($block_paths);

        $blocks = $this->getDoctrine()
            ->getRepository(Block::class)
            ->findAll();

        foreach ($blocks as $block) {
            $path = $block->getPath();
            if (in_array($path, $block_paths)) {
                $key = array_search($path, $block_paths);
                unset($block_paths[$key]);
            }
        }

        return [
            'block_paths' => $block_paths,
            'blocks' => $blocks,
        ];
    }
}
