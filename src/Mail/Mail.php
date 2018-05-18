<?php

namespace Brendt\Stitcher\Mail;

interface Mail
{
    public function to(): ?string;

    public function subject(): string;

    public function body(): string;
}
