<?php

namespace App\Controller\Home;

use App\Service\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AjaxController extends AbstractController
{
    private $classe = [
        'contact' => [
            'form_type' => \App\Form\ContactType::class,
            'context' => 'contact',
        ]
    ];

    /**
     * @param Request $request
     * @param Mail $mail
     * @return JsonResponse
     */
    public function ajax(Request $request, Mail $mail)
    {
        $_context = $request->request->get('context');

        if (empty($_context)) {
            return new JsonResponse(['success' => 'false']);
        }
        $context = $this->classe[$_context];

        $formType = $context['form_type'];

        $model = 'App\\Entity\\'.ucfirst($_context);
        $model = new $model();
        $form = $this->createForm($formType, $model)->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($request->get('news_letter')) {
                $mail->sendMailChimp($request->get('news_letter')['email']);
            }
            /*
            if (!$form->isValid()) {

                return $this->json([
                    'status' => 'error',
                    'message' => 'Missing parameter'
                ]);
            }*/
            $datas = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($datas);
            $entityManager->flush();

            //$mail->sendContactMail($datas);
            if (strtolower($_context) == 'gift') {
                $mail->sendGiftMail($datas);
            } else {
                $mail->sendContactMail($datas);
            }
        }

        return new JsonResponse(['success' => 'ok']);
    }
}
