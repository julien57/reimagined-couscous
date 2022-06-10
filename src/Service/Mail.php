<?php

namespace App\Service;

use App\Entity\Contact;
use App\Entity\Gift;
use MailchimpMarketing\ApiClient;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class Mail
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;   
 }

    public function sendContactMail(Contact $contactForm)
    {
        $email = (new TemplatedEmail())
            ->from('parc-hotel@not-reply.lu')
            ->to('vanessa.piovani@idp.lu')
            ->subject('Contact Request From Alvisse Website')
            ->htmlTemplate('email/contact.html.twig')
            ->context([
                'contact' => $contactForm,
            ]);

        $this->mailer->send($email);
    }

    public function sendGiftmail(Gift $giftForm)
    {
        $email = (new TemplatedEmail())
            ->from('parc-hotel@not-reply.lu')
            ->to('vanessa.piovani@idp.lu')
            ->subject('Contact Request From Alvisse Website')
            ->htmlTemplate('email/gift.html.twig')
            ->context([
                'contact' => $giftForm,
            ]);

        $this->mailer->send($email);
    }


    public function sendOffer(array $params)
    {
        $email = (new TemplatedEmail())
            ->from('parc-hotel@not-reply.lu')
            ->to('vanessa.piovani@idp.lu')
            ->subject('New offer Saferpay')
            ->htmlTemplate('email/offer-saferpay.html.twig')
            ->context([
                'datas' => $params,
            ]);

        $this->mailer->send($email);
    }

    public function sendDayroom(array $params)
    {
        $email = (new TemplatedEmail())
            ->from('parc-hotel@not-reply.lu')
            ->to('vanessa.piovani@idp.lu')
            ->subject('Nouvelle demande offre spécial')
            ->htmlTemplate('email/offer-saferpay.html.twig')
            ->context([
                'datas' => $params,
            ]);

        $this->mailer->send($email);
    }

    public function sendMailChimp(string $email)
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => 'f61c8945d4',
            'server' => $_SERVER['HTTP_HOST'],
        ]);

        $response = $mailchimp->ping->get();
    }
}
