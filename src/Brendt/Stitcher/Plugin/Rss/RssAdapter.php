<?php

namespace Brendt\Stitcher\Plugin\Rss;

use Brendt\Stitcher\Adapter\AbstractAdapter;
use Brendt\Stitcher\Site\Http\Header;
use Brendt\Stitcher\Site\Page;

class RssAdapter extends AbstractAdapter
{
    public function transformPage(Page $page, $filter = null): array
    {
        $page->addHeader(new Header('Content-Type', 'application/xml;charset=UTF-8'));

        return [$page];
    }
}
