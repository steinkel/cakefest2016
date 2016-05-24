<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Newsletter',
    ['path' => '/newsletter'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
