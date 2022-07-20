<?php

namespace App\Controller\Bo;

use App\Entity\Menu;
use App\Repository\LanguageRepository;
use App\Repository\MenuRepository;
use App\Repository\PageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function editMenu(
        PageRepository $pageRepository,
        LanguageRepository $languageRepository,
        MenuRepository $menuRepository)
    {
        $menu = $menuRepository->findOneBy(['name' => 'main_menu']);

        if (!$menu) {
            $menu = $this->create();
        }

        return $this->render('bo/menu/edit.html.twig', [
            'pages' => $pageRepository->findAll(),
            'pagesEdit' => $pageRepository->findBy(['active' => 1]),
            'langs' => $languageRepository->findAll(),
            'menus' => json_decode($menu->getJsonData()),
        ]);
    }

    public function saveMenu(Request $request, EntityManagerInterface $em, MenuRepository $menuRepository)
    {
        if (!$request->get('arrayMenu')) {
            return $this->json([
                'status' => 'error',
                'message' => 'Missing parameters',
            ], Response::HTTP_NOT_FOUND);
        }

        $menu = $menuRepository->findOneBy(['name' => 'main_menu']);
        $menu->setJsonData($request->get('arrayMenu'));
        $em->flush();

        return $this->json([
            'status' => 'ok',
        ], Response::HTTP_OK);
    }

    private function create()
    {
        $menu = new Menu();
        $menu->setName('main_menu');

        $this->em->persist($menu);
        $this->em->flush();

        return $menu;
    }
}
