<?php
/**
 * Created by PhpStorm.
 * User: yazidneghiche
 * Date: 23/03/2021
 * Time: 21:45.
 */

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function index()
    {
        return $this->render('admin/_index.html.twig');
    }

    public function page()
    {
        return $this->render('admin/_index.html.twig');
    }
}
