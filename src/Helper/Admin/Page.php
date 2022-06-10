<?php

namespace App\Helper\Admin;

use App\Entity\PageBlock;

class Page
{
    public function create()
    {
    }

    public function getDataPage($page)
    {
        $page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->findByPage($page);
        //$page_blocks = $this->getDoctrine()->getRepository(PageBlock::class)->findAll();

        //->findBy(array('page' => $page)  );
        dump($page_blocks);
        exit();

        return $page_blocks;
    }
}
