<?php

namespace App\Controller\Bo;

use App\Entity\Page;
use App\Entity\PageBlock;
use App\Repository\ContentRepository;
use App\Repository\LanguageRepository;
use App\Repository\PageRepository;
use App\Service\LangService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PageController extends AbstractController
{
    private PageRepository $pageRepository;
    private LanguageRepository $languageRepository;
    private ContentRepository $contentRepository;
    private EntityManagerInterface $em;

    public function __construct(PageRepository $pageRepository, LanguageRepository $languageRepository, ContentRepository $contentRepository, EntityManagerInterface $em)
    {
        $this->pageRepository = $pageRepository;
        $this->languageRepository = $languageRepository;
        $this->contentRepository = $contentRepository;
        $this->em = $em;
    }

    public function createPage(SessionInterface $session, LangService $langService)
    {
        $new = new Page();
        $new->setName('Nouvelle Page '.uniqid());
        $new->setType(Page::PAGE_TYPE_PAGE);

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

        $this->addFlash('success', 'Page créée');

        return $this->redirectToRoute('bo_page_by_type', [
            'slug' => $new->getSlug(),
            'type' => 2,
        ]);
    }
}