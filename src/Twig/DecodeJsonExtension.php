<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DecodeJsonExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('json_decode', [$this, 'decodeJson'])
        ];
    }

    public function decodeJson($content)
    {
        return json_decode($content->getJsonData());
    }
}