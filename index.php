<?php

require_once "vendor/autoload.php";

$app = new \Slim\App();

$app->get('/', function ($request, $response, $args) {
    return $response->withStatus(200)->write('Hello World! ola mundo');
});

$app->run();