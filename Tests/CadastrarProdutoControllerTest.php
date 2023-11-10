<?php

namespace Test;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\ProdutoController;
use PHPUnit\Framework\TestCase;

class CadastrarTodosProdutoControllerTest extends TestCase{
    
    private function createRequest($method, $route)
    {
        $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => $method,
            'REQUEST_URI' => $route
        ]);

        $request = \Slim\Http\Request::createFromEnvironment($environment);

        return $request;
    }
    
}