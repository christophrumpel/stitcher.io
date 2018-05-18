<?php

namespace Brendt\Stitcher\Handler\Comments;

use Brendt\Stitcher\Handler\Handler;
use Brendt\Stitcher\Model\Comments;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class Verify extends Handler
{
    public function handle(Request $request, string $blogId, string $commentId): Response
    {
        $comments = new Comments($blogId);

        $comments->verify($commentId);

        return $this->redirect('/');
    }
}
