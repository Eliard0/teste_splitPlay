<?php
namespace Test\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Test\Db\Conexao;
use Test\Db\Produto;
use Test\Models\ProdutoModel;

class ProdutoController extends Conexao{

    function getProdutos( $request, $response, $args) {

        // $produto = new Produto();
        // $produto->getProdutos();

        $query = $this->pdo->query('SELECT id, nome, descricao, preco, quantidade FROM produto');
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $response->withJson($result);
    }

    function addProduto($request, $response, $args) {

        $dado = $request->getParsedBody();
        
        $produto = new Produto();
        $baseProduto = new ProdutoModel();

        $baseProduto->setNome($dado['nome'])
                    ->setPreco($dado['preco'])
                    ->setDescricao($dado['descricao'])
                    ->setQuantidade($dado['quantidade']);

        $produto->inserirProduto($baseProduto);

        $response = $response->withJson(['message'=>' cadastrado com sucesso'])->withStatus(200);
        
        return $response;


//         git remote add origin https://github.com/Eliard0/cola.git
// git branch -M main
// git push -u origin main

    }

    function putProduto( $request, $response, $args) {
        
        $response = $response->withJson(['message'=>' cadastrado com sucesso'])->withStatus(200);
        
        return $response;
    }

    function deleteProduto( $request, $response, $args) {
        
        $response = $response->withJson(['message'=>' cadastrado com sucesso'])->withStatus(200);
        
        return $response;
    }

    function getProdutoId( $request, $response, $args) {
        
        $response = $response->withJson(['message'=>' cadastrado com sucesso'])->withStatus(200);
        
        return $response;
    }
    
    public function olaMundo( $req, $response, $args = []){
    $response->getBody()->write("Hello word me livrando da maudição mais uma vez");

    return $response;
    }

}