<?php

namespace App\Controller\Bo;

use App\Entity\Language;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LanguageController extends AbstractController
{
    public function languageSwitch(Language $language, Request $request, SessionInterface $session)
    {
        $request->getSession()->set('_locale', $language->getCode());
        $request->setLocale($language->getCode());
        $session->set('_locale', $language->getCode());

        return $this->redirectToRoute('bo');
    }
}
