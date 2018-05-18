<?php

namespace Brendt\Stitcher\Handler\Comments;

use Brendt\Stitcher\Handler\Handler;
use Brendt\Stitcher\Mail\CommentConfirmMail;
use Brendt\Stitcher\Model\Comments;
use Brendt\Stitcher\Services\Mailer;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

final class Store extends Handler
{
    /** @var \Brendt\Stitcher\Services\Mailer */
    private $mailer;

    public function __construct()
    {
        $this->mailer = new Mailer();
    }

    public function handle(Request $request, string $postId): Response
    {
        $data = json_decode((string) $request->getBody(), true) ?? [];

        $comments = new Comments($postId);

        $comment = $comments->store($postId, $data);

        $this->mailer->send(new CommentConfirmMail($comment));

        return new Response(201);
    }
}
