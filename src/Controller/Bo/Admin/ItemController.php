<?php

namespace App\Controller\Bo\Admin;

use App\Entity\Block;
use App\Entity\BlockItem;
use App\Entity\Item;
use App\Form\ItemType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Request $request
     * @param Item|null $item
     * @return Response
     */
    public function index(Request $request): Response
    {
        $item = new Item();
        $form = $this->createForm(ItemType::class, $item)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $page = $form->getData();
            $this->em->persist($page);
            $this->em->flush();
        }

        return $this->render('bo/super_admin/item/new.html.twig', [
            'form' => $form->createView(),
            'items' => $this->getDoctrine()->getRepository(Item::class)->findAll(),
            'item' => $item,
        ]);
    }

    /**
     * @param Item $item
     * @param Request $request
     * @return Response
     */
    public function update(Item $item, Request $request): Response
    {
        $form = $this->createForm(ItemType::class, $item)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
        }

        return $this->render('bo/super_admin/item/update.html.twig', [
            'form' => $form->createView(),
            'items' => $this->getDoctrine()->getRepository(Item::class)->findAll(),
            'item' => $item,
        ]);
    }

    public function remove(Item $item, EntityManagerInterface $em)
    {
        /*
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
         */


        foreach ($item->getBlockItems() as $blockItem) {
            $blockItem->setItem(null);
        }

        $em->remove($item);
        $em->flush();

        $this->addFlash('success', 'Champs supprimé');
        return $this->redirectToRoute('admin_item');
    }
}
