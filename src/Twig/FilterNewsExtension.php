<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FilterNewsExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('filter_news', [$this, 'filterNews'])
        ];
    }

    public function filterNews(?array $pageBlocks)
    {
        $arrayNews = [];

        $loop = 0;
        foreach ($pageBlocks as $pageBlock) {
            if ($pageBlock->getJsonData()) {
                $datas = json_decode($pageBlock->getJsonData());

                $pageId = $pageBlock->getPage()->getId();

                if (isset($datas->published_at)) {

                    if (isset($arrayNews[$datas->published_at])) {
                        $arrayNews[$datas->published_at.'/'.$loop][] = $datas;
                        //$arrayNews[$datas->published_at][] = $datas;
                    } else {
                        $arrayNews[$datas->published_at][] = json_decode($pageBlock->getJsonData());
                    }
                }

            }
            $loop++;
        }

        krsort($arrayNews);

        return $arrayNews;
    }
}