<?php

namespace Test;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\ProdutoController;
use PHPUnit\Framework\TestCase;

class ProdutoIdControllerTest extends TestCase{
    
    private function createRequest($method, $route)
    {
        $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => $method,
            'REQUEST_URI' => $route
        ]);

        $request = \Slim\Http\Request::createFromEnvironment($environment);

        return $request;
    }
    
    public function testgetProdutoId(){

        $obj = new ProdutoController();
        $id = "2";

        $request = $this->createRequest('GET', 'http://localhost/slim/index.php/produto/$id');
        $response = new \Slim\Http\Response();

        $response = $obj->getProdutoId($request, $response, ["id" => $id]);

        $produto = json_decode((string)$response->getBody(), true);

        $this->assertEquals($id, $produto["id"]);

        $this->assertArrayHasKey("nome", $produto);
        $this->assertArrayHasKey("preco", $produto);
        $this->assertArrayHasKey("descricao", $produto);
    }

}