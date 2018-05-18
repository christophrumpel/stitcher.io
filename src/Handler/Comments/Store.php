<?php

namespace Brendt\Stitcher\Handler\Comments;

use Brendt\Stitcher\Handler\Handler;
use Brendt\Stitcher\Model\Comments;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class Store extends Handler
{
    public function handle(Request $request, string $postId): Response
    {
        $data = json_decode((string) $request->getBody(), true) ?? [];

        $comments = new Comments($postId);

        $comments->store($data);

        return new Response(201);
    }
}
