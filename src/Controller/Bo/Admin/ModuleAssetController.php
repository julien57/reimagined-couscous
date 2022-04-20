<?php

namespace App\Controller\Bo\Admin;

use App\Entity\Module;
use App\Entity\ModuleAsset;
use App\Form\ModuleAssetType;
use App\Repository\ModuleAssetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ModuleAssetController extends AbstractController
{
    private ModuleAssetRepository $assetRepository;
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em, ModuleAssetRepository $assetRepository)
    {
        $this->assetRepository = $assetRepository;
        $this->em = $em;
    }

    public function editAssetModule(Module $module, Request $request)
    {
        $moduleAsset = $this->assetRepository->findOneBy(['module' => $module]);

        if (!$moduleAsset) {
            $moduleAsset = new ModuleAsset();
        }

        $form = $this->createForm(ModuleAssetType::class, $moduleAsset)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $moduleAsset->setModule($module);
            $module->setModuleAsset($moduleAsset);

            $this->em->persist($moduleAsset);
            $this->em->flush();

            $this->addFlash('success', 'Assets du module '.$module->getName().' enregistrés !');
            return $this->redirectToRoute('admin_module_list');
        }

        return $this->render('bo/super_admin/module_asset/edit.html.twig', [
            'module' => $module,
            'form' => $form->createView()
        ]);
    }
}