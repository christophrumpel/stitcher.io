<?php

namespace Brendt\Stitcher\Services;

use Brendt\Stitcher\Mail\Mail;
use Pageon\Lib\Parsedown;
use Stitcher\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mailer
{
    /** @var \Swift_Mailer */
    private $mailer;

    /** @var \Pageon\Lib\Parsedown */
    private $markdownParser;

    public function __construct()
    {
        $transport = (new Swift_SmtpTransport(env('MAIL_HOST'), env('MAIL_PORT'), env('MAIL_ENCRYPTION')))
            ->setUsername(env('MAIL_USERNAME'))
            ->setPassword(env('MAIL_PASSWORD'));

        $this->mailer = new Swift_Mailer($transport);

        $this->markdownParser = App::get(Parsedown::class);
    }

    public function send(Mail $mail)
    {
        $message = (new Swift_Message($mail->subject()))
            ->setFrom([env('MAIL_FROM_ADDRESS') => env('MAIL_FROM_NAME')])
            ->setTo([$mail->to()])
            ->setContentType('text/html')
            ->setBody($this->markdownParser->parse($mail->body()));

        $this->mailer->send($message);
    }
}
