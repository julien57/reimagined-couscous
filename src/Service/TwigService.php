<?php

namespace App\Service;

use App\Entity\Page;
use App\Repository\ContentRepository;
use App\Repository\LanguageRepository;
use App\Repository\PageRepository;

class TwigService
{
    /** @var ContentRepository */
    private $contentRepository;

    /** @var PageRepository */
    private $pageRepository;

    /** @var LanguageRepository */
    private $languageRepository;

    public function __construct(ContentRepository $contentRepository, PageRepository $pageRepository, LanguageRepository $languageRepository)
    {
        $this->contentRepository = $contentRepository;
        $this->pageRepository = $pageRepository;
        $this->languageRepository = $languageRepository;
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
            $language = $this->languageRepository->find($value->getLanguage());
            $values[] = $language->getCode();
        }

        return $values;
    }
}
