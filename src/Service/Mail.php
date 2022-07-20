<?php

namespace App\Service;

use App\Entity\Contact;
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
}
