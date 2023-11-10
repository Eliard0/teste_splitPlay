<?php

namespace Test;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\ProdutoController;
use PHPUnit\Framework\TestCase;

class ProdutoIdControllerTest extends TestCase{
    
    private function createRequest($method, $route)
    {
        // Crie um ambiente simulado com o método e a rota especificados
        $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => $method,
            'REQUEST_URI' => $route
        ]);

        // Crie um objeto de requisição com o ambiente simulado
        $request = \Slim\Http\Request::createFromEnvironment($environment);

        // Retorne o objeto de requisição
        return $request;
    }
    
    public function testgetProdutoId(){

        $obj = new ProdutoController();
        $id = 2;

        $request = $this->createRequest('GET', 'http://localhost/slim/index.php/produto/'.$id);
        $response = new \Slim\Http\Response();

        $produto = $obj->getProdutoId($request, $response, $id);
        $this->assertNotNull($produto);
        $this->assertEquals($id, $produto->id);
        $this->assertNotEmpty($produto->nome);
    }

}