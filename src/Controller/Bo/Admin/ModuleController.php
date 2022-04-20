<?php

namespace App\Controller\Bo\Admin;

use App\Repository\ModuleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ModuleController
 * @package App\Controller\Bo\Admin
 */
class ModuleController extends AbstractController
{
    /**
     * @var ModuleRepository
     */
    private ModuleRepository $moduleRepository;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(ModuleRepository $moduleRepository, EntityManagerInterface $em)
    {
        $this->moduleRepository = $moduleRepository;
        $this->em = $em;
    }

    public function list()
    {
        return $this->render('bo/super_admin/module/list.html.twig', [
            'modules' => $this->moduleRepository->findAll()
        ]);
    }

    public function activateModule(Request $request)
    {
        if (!$request->get('module_id')) {
            return $this->json([
                'message' => 'error'
            ], Response::HTTP_NOT_FOUND);
        }

        $module = $this->moduleRepository->find($request->get('module_id'));

        if ($module->getIsActivated()) {
            $module->setIsActivated(false);
        } else {
            $module->setIsActivated(true);
        }

        $this->em->flush();

        return $this->json([
            'message' => 'ok',
            'isActivated' => $module->getIsActivated()
        ], Response::HTTP_OK);
    }
}