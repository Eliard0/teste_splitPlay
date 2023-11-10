<?php

namespace Test;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\ProdutoController;
use PHPUnit\Framework\TestCase;

class PegarTodosProdutoControllerTest extends TestCase{
    
    private function createRequest($method, $route)
    {
        $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => $method,
            'REQUEST_URI' => $route
        ]);

        $request = \Slim\Http\Request::createFromEnvironment($environment);

        return $request;
    }
    
    public function testGetProdutos(){
        $obj = new ProdutoController();

        $request = $this->createRequest('GET', '/');
 
        $response = new \Slim\Http\Response();
 
        $response = $obj->getProdutos($request, $response, array());
 
        $body = $response->getBody();
 
        $status = $response->getStatusCode();
 
        $data = json_decode($body, true);
 
        $this->assertEquals(200, $status);
 
        $this->assertNotEmpty($data);
        $this->assertIsArray($data);
    }

}