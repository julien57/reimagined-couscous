<?php

namespace App\Service;

use App\Entity\Page;
use App\Repository\ContentRepository;
use App\Repository\LanguageRepository;
use App\Repository\PageBlockRepository;
use App\Repository\PageRepository;
use App\Repository\BlockChildrenRepository;

class TwigService
{
    /**
     * @var ContentRepository
     */
    private $contentRepository;

    /**
     * @var PageRepository
     */
    private $pageRepository;

    /**
     * @var LanguageRepository
     */
    private $languageRepository;

    /**
     * @var PageBlockRepository
     */
    private $pageBlockRepository;

    /**
     * @var BlockChildrenRepository
     */
    private $blockChildrenRepository;

    public function __construct(ContentRepository $contentRepository, BlockChildrenRepository $blockChildrenRepository, PageRepository $pageRepository, LanguageRepository $languageRepository, PageBlockRepository $pageBlockRepository)
    {
        $this->contentRepository = $contentRepository;
        $this->pageRepository = $pageRepository;
        $this->languageRepository = $languageRepository;
        $this->pageBlockRepository = $pageBlockRepository;
        $this->blockChildrenRepository = $blockChildrenRepository;
    }

    public function getLatestNews(int $pageBlockId)
    {
        $posts = $this->pageBlockRepository->getNews();
        return $posts;
    }

    public function getContentNews(int $pageBlockId)
    {
        $contents = $this->blockChildrenRepository->getContents($pageBlockId);
        return $contents;
    }

    public function isLangExitByPage(int $langId, int $pageId)
    {
        $contents = $this->contentRepository->getLangExist($langId, $pageId);

        return count($contents);
    }

    public function getPageById(int $id)
    {
        return $this->pageRepository->find($id);
    }

    public function getPagesType()
    {
        return $this->pageRepository->getPages();
    }

    public function getPagesTypeDesc()
    {
        return $this->pageRepository->getPagesDesc();
    }

    public function getLanguages()
    {
        return $this->languageRepository->findAll();
    }

    public function getLanguagesByPage(Page $page)
    {
        $langs = $this->contentRepository->getContentsByLang($page);
        $values = [];
        foreach ($langs as $key => $value) {
            $values[] = $value['language'];
        }

        return $values;
    }
}
