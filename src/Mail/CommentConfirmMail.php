<?php

namespace Brendt\Stitcher\Mail;

class CommentConfirmMail implements Mail
{
    /** @var array */
    private $comment;

    public function __construct(array $comment)
    {
        $this->comment = $comment;
    }

    public function to(): string
    {
        return $this->comment['email'];
    }

    public function subject(): string
    {
        return 'Confirm your comment on Stitcher.io';
    }

    public function body(): string
    {
        $host = env('HOST');

        $commentId = $this->comment['id'];

        $postId = $this->comment['postId'];

        $commentBody = $this->comment['body'];

        return <<<MD
# Please confirm your comment

Thanks for leaving a comment! Please confirm it by clicking [here]($host/comments/$postId/$commentId/verify).

$commentBody

Kind regards
<br>Brent
MD;
    }
}
