<?php
/**
 * Created by PhpStorm.
 * User: yazidneghiche
 * Date: 23/03/2021
 * Time: 21:45.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    public function test($template)
    {
        return $this->render('home/_accueil.html.twig');
    }
}
