<?php

namespace App\Controller\Bo;

use App\Entity\Page;
use App\Repository\ContentRepository;
use App\Repository\LanguageRepository;
use App\Repository\PageRepository;
use App\Service\LangService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PostController extends AbstractController
{
    /**
     * @var PageRepository
     */
    private $pageRepository;

    /**
     * @var LanguageRepository
     */
    private $languageRepository;

    /**
     * @var ContentRepository
     */
    private $contentRepository;

    /**
     * @var EntityManagerInterface
     */
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

    public function createPost(Request $request, SessionInterface $session, LangService $langService)
    {
        $page = $this->pageRepository->findOneBy(['name' => 'article']);
        $lastPage = $this->pageRepository->findOneBy([], ['id' => 'DESC']);
        $lastPageId = $lastPage->getId() + 1;
 
        $new = clone $page;
        $new->setName('Nouvel article '.$lastPageId);
        $new->setType(Page::PAGE_TYPE_POST);

        $localSession = $session->get('_locale_edit');
        if ('en' === $localSession) {
            $localSession = 'us';
        }

        $currentLang = $this->languageRepository->findOneBy(['code' => $localSession]);
        $otherContentsPage = $this->contentRepository->getLangExist($currentLang->getId(), $page->getId());
        $codeNextLang = $langService->getLocaleByLanguageId($currentLang->getId());

        foreach ($page->getPageBlock() as $blockPage) {
            $newBlockPage = clone $blockPage;
            $new->addPageBlock($newBlockPage);
            $newBlockPage->setPage($new);
            $this->em->persist($newBlockPage);

            foreach ($blockPage->getPageBlock() as $childBlock) {
                $newBlockChild = clone $childBlock;
                $newBlockPage->addPageBlock($newBlockChild);
                $newBlockChild->setPageBlock($newBlockPage);
                $this->em->persist($newBlockChild);
            }

            $oldContent = $this->contentRepository->findOneBy(['pageBlock' => $blockPage]);

            if ($oldContent) {
                $newContent = clone $oldContent;
                $newContent->setLanguage($langService->getCodeLanguage($codeNextLang));
                $newContent->setPageblock($newBlockPage);
                $this->em->persist($newContent);
            }
        }

        $this->em->persist($new);
        $this->em->flush();

        $this->addFlash('success', 'Page dupliquée, vous êtes maintenant sur la page "'.$new->getName().'" !');

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
