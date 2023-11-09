<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\ProdutoController;

require 'vendor/autoload.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App($configuration);

$app->get('/', ProdutoController::class.':getProdutos');
$app->post('/adicionar/produto/', ProdutoController::class.':addProduto');
$app->put('/atualizar/produto/', ProdutoController::class.':putProduto');
$app->delete('/deletar/produto/', ProdutoController::class.':dellProduto');

$app->get('/produto/{id}', ProdutoController::class.':getProdutoId');


$app->run();
