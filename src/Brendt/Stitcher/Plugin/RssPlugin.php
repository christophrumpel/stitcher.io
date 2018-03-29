<?php

namespace Brendt\Stitcher\Plugin;

use Brendt\Stitcher\App;
use Brendt\Stitcher\Event\Event;
use Brendt\Stitcher\Parser\Site\SiteParser;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Filesystem\Filesystem;

class RssPlugin implements Plugin, EventSubscriberInterface {

    public function __construct() {
        /** @var \Symfony\Component\EventDispatcher\EventDispatcher $eventDispatcher */
        $eventDispatcher = App::get('service.event.dispatcher');

        $eventDispatcher->addSubscriber($this);
    }

    public function onPageParsed(Event $event)
    {
        $pageId = $event->getData()['pageId'] ?? null;

        if ($pageId !== 'rss') {
            return;
        }

        $publicDirectory = App::getParameter('directories.public');

        $fs = new Filesystem();

        $fs->copy($publicDirectory . '/rss.html', $publicDirectory . '/rss.xml');
    }

    public static function getConfigPath() {
        return null;
    }

    public static function getServicesPath() {
        return null;
    }

    public static function getSubscribedEvents()
    {
        return [
            SiteParser::EVENT_PAGE_PARSED => 'onPageParsed',
        ];
    }
}
