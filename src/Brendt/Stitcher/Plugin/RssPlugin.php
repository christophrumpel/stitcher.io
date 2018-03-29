<?php

namespace Brendt\Stitcher\Plugin;

use Brendt\Stitcher\App;
use Brendt\Stitcher\Factory\AdapterFactory;

class RssPlugin implements Plugin {

    public function __construct() {
        /** @var AdapterFactory $adapterFactory */
        $adapterFactory = App::get('factory.adapter');

        $adapterFactory->addAdapter('rss', function () {
            return App::get('adapter.rss');
        });
    }

    public static function getConfigPath() {
        return;
    }

    public static function getServicesPath() {
        return __DIR__ . '/../../../../config/services.rss.yml';
    }
}
