<?php

namespace Test;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\ProdutoController;
use PHPUnit\Framework\TestCase;

class DeletarProdutoControllerTest extends TestCase{
    
    private function createRequest($method, $route)
    {
        $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => $method,
            'REQUEST_URI' => $route
        ]);

        $request = \Slim\Http\Request::createFromEnvironment($environment);

        return $request;
    }
    
    public function testdellProduto(){

        $obj = new ProdutoController();
        $id = 10;

        $request = $this->createRequest('DELETE', 'http://localhost/slim/index.php/deletar/produto/');
        $response = new \Slim\Http\Response();

        $response = $obj->dellProduto($request, $response, $id);

        $produto = json_decode($response, true);

        $this->assertEquals($id, $produto["id"]);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('{"menssagem":"Deletado com sucesso"}', $produto);
    }

}