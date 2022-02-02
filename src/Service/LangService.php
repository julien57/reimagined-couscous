<?php

namespace App\Service;

use App\Entity\Content;
use App\Repository\LanguageRepository;

class LangService
{
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function getCodeLanguage(string $code)
    {
        switch ($code) {
            case 'fr':
                return Content::LANGUAGE_FR;
            case 'en':
                return Content::LANGUAGE_EN;
            case 'us':
                return Content::LANGUAGE_EN;
            case 'de':
                return Content::LANGUAGE_DE;
        }
    }

    public function getLocaleByLanguageId(int $langId)
    {
        $language = $this->languageRepository->find($langId);

        return $language->getCode();
    }
}
