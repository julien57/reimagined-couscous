<?php

namespace App\Controller\Admin;

use App\Entity\Block;
use App\Entity\BlockItem;
use App\Entity\Item;
use App\Form\ItemType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends AbstractController
{
    /**
     * @param null $id
     */
    public function index(Request $request, $id = null): Response
    {
        $item = new Item();

        $form = $this->createForm(ItemType::class, $item,
            [
                'action' => $this->generateUrl('admin_item'),
                'method' => 'POST',
            ]
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $page = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($page);
            $entityManager->flush();
        }

        $items = $this->getDoctrine()->getRepository(Item::class)->findAll();

        $_items = [];
        foreach ($items as $item) {
            $_items[] = $item->getName();
        }

        return $this->render('admin/item/index.html.twig', [
            'form' => $form->createView(),
            'items' => $items,
        ]);
    }

    /**
     * @param BlockItem $item
     *
     * @return JsonResponse
     */
    public function remove(Request $request, $block, $item)
    {
        $block = $request->request->get('block');
        $item = $request->request->get('item');
        $block = $this->getDoctrine()->getRepository(Block::class)->find(
            $block
        );

        $item = $this->getDoctrine()->getRepository(Item::class)->find(
            $item
        );

        $blockItem = $this->getDoctrine()->getRepository(BlockItem::class)->findOneBy(
            ['block' => $block, 'item' => $item]
        );

        $em = $this->getDoctrine()->getManager();
        $em->remove($blockItem);
        $em->flush();

        return new JsonResponse(['success' => 'ok']);
    }
}
