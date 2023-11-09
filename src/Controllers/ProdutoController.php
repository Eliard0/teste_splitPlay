<?php
namespace Test\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Test\Db\Conexao;
use Test\Db\Produto;
use Test\Models\ProdutoModel;

class ProdutoController extends Conexao{
    
    function getProdutos( $request, $response, $args) {
        
        $query = $this->pdo->query('SELECT id, nome, descricao, preco, quantidade FROM produto');
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        return $response->withJson($result);
    }
    
    // no futuro fazer uma função so para buscar todos por id;

    function getProdutoId( $request, $response, $args) {
        $id = $args['id'];
        $query = $this->pdo->prepare('SELECT * FROM produto WHERE id = :id');
        $query->execute(['id' => $id]);
        $dado = $query->fetch(\PDO::FETCH_ASSOC);
    if (!$dado) {
        return $response->withStatus(404);
        }
        return $response->withJson($dado);
    }

    function addProduto($request, $response, $args) {

        $dado = $request->getParsedBody();
        
        $produto = new Produto();
        $baseProduto = new ProdutoModel();

        $baseProduto->setNome($dado['nome'])
                    ->setPreco($dado['preco'])
                    ->setDescricao($dado['descricao'])
                    ->setQuantidade($dado['quantidade']);

        $produto->postProduto($baseProduto);

        $response = $response->withJson(['message'=>' Cadastrado com sucesso'])->withStatus(200);
        
        return $response;

    }

    function putProduto( $request, $response, $args) {
        $dado = $request->getParsedBody();

        $produto = new Produto();
        $baseProduto = new ProdutoModel();
        $baseProduto->setId($dado['id'])
                    ->setNome($dado['nome'])
                    ->setPreco($dado['preco'])
                    ->setDescricao($dado['descricao'])
                    ->setQuantidade($dado['quantidade']);
        $produto->updateProduto($baseProduto);

        $response = $response->withJson([
            'message' => 'Alterada com sucesso!'
        ]);

        return $response;
    }

    function dellProduto( $request, $response, $args) {

        $dado = $request->getParsedBody();
        
        $produto = new Produto();
        $baseProduto = new ProdutoModel();

        $baseProduto->setId($dado['id']);

        $produto->dellProduto((int)$baseProduto);
        
        $response = $response->withJson(['message'=>' Deletado com sucesso'])->withStatus(200);
        
        return $response;
    }

    
    public function olaMundo( $req, $response, $args = []){
    $response->getBody()->write("Hello word me livrando da maudição mais uma vez");

    return $response;
    }

}