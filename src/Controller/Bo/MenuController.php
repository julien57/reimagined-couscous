<?php

namespace App\Controller\Bo;

use App\Repository\LanguageRepository;
use App\Repository\MenuRepository;
use App\Repository\PageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends AbstractController
{
    public function editMenu(
        PageRepository $pageRepository,
        LanguageRepository $languageRepository,
        MenuRepository $menuRepository)
    {
        $menu = $menuRepository->findOneBy(['name' => 'main_menu']);

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
}
