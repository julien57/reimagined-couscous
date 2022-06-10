<?php
/**
 * Created by PhpStorm.
 * User: yazidneghiche
 * Date: 23/03/2021
 * Time: 20:26.
 */

namespace App\Controller\Home;

use App\Service\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends AbstractController
{
    private $classe = [
        'contact' => [
            'form_type' => \App\Form\ContactType::class,
            'context' => 'contact',
        ],
        'gift' => [
            'form_type' => \App\Form\GiftType::class,
            'context' => 'gift',
        ],
        'newsletter' => [
            'form_type' => \App\Form\NewsLetterType::class,
            'context' => 'news_letter',
        ],
    ];

    /**
     * @return JsonResponse
     *
     * @throws \TypeError
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

        $form = $this->createForm($formType, $model);

        $form->handleRequest($request);

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
	    if(strtolower($_context) == 'gift'){
                $mail->sendGiftMail($datas);
            }else{
                 $mail->sendContactMail($datas);
            }
        }

        return new JsonResponse(['success' => 'ok' ]);
    }

    /**
     * @param $slug
     * @param string $id
     *
     * @return Response
     */
    public function contact(Request $request)
    {
    }

    public function room(Request $request)
    {
    }

    public function restaurant(Request $request)
    {
    }

    public function gift(Request $request)
    {
    }
}
