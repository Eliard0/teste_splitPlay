<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use SplitPlay\Controllers\ProdutosController\ProdutoController;

require_once "vendor/autoload.php";

$app = new \Slim\App();

$app->get('/', function ($request, $response, $args) {
    return $response->withStatus(200)->write('Hello World! ola mundo');
});

$app->post('/produto', function ($request, $response, $args) {
    $data = $request->getParsedBody();
    print_r($data);die;
    // $nome = $args['nome'];
    // return $response->withStatus(200)->write("{$nome} ola mundo");
});

$app->run();