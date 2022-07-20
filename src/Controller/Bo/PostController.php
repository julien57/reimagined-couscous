<?php

namespace App\Controller\Bo;

use App\Entity\Page;
use App\Entity\PageBlock;
use App\Repository\ContentRepository;
use App\Repository\LanguageRepository;
use App\Repository\PageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PostController extends AbstractController
{
    /** @var PageRepository */
    private $pageRepository;

    /** @var LanguageRepository */
    private $languageRepository;

    /** @var ContentRepository */
    private $contentRepository;

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(
        EntityManagerInterface $em,
        PageRepository $pageRepository,
        LanguageRepository $languageRepository,
        ContentRepository $contentRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->languageRepository = $languageRepository;
        $this->contentRepository = $contentRepository;
        $this->em = $em;
    }

    public function createPost(SessionInterface $session, Request $request)
    {
        if (!$request->get('page_name')) {
            $this->addFlash('danger', 'Aucun nom pour l’actu');

            return $this->redirectToRoute('bo');
        }

        $new = new Page();
        $new->setName($request->get('page_name'));
        $new->setType(Page::PAGE_TYPE_POST);

        $newBlockPage = new PageBlock();
        $newBlockPage->setItemOrder(0);
        $new->addPageBlock($newBlockPage);
        $newBlockPage->setPage($new);

        $localSession = $session->get('_locale_edit');
        if ('en' === $localSession) {
            $localSession = 'us';
        }

        $this->em->persist($newBlockPage);
        $this->em->persist($new);
        $this->em->flush();

        $this->addFlash('success', 'Actualitée créée');

        return $this->redirectToRoute('bo_page_by_type', [
            'slug' => $new->getSlug(),
            'type' => 2,
        ]);
    }

    public function list()
    {
        return $this->render('bo/post/list.html.twig', [
            'pages' => $this->getDoctrine()->getRepository(Page::class)->getArticles(),
        ]);
    }
}
