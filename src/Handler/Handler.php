<?php

namespace Brendt\Stitcher\Handler;

use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;

abstract class Handler
{
    protected function json(array $data): Response
    {
        return (new Response())
            ->withStatus(200)
            ->withHeader('Content-Type', 'application/json')
            ->withBody(stream_for(json_encode(['data' => $data])));
    }
}
