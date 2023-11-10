<?php
namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Db\Conexao;
use App\Db\Produto;
use App\Models\ProdutoModel;

class ProdutoController extends Conexao{
    
    function getProdutos( $request, $response, $args) {
        
        try{

        $query = $this->pdo->query('SELECT id, nome, descricao, preco, quantidade FROM produto');
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        return $response->withJson($result);
        
        } catch(\Exception | \Throwable $ex){
            return $response->withJson([
                'error' => \Exception::class,
                'status' => 404,
                'code' => '001',
                'userMessage' => "Algo de errado não esta certo ENTRA EM CONTATO COM O SUPORTE",
                'developerMessage' => $ex->getMessage()
            ], 500);
        }
    }
    
    // no futuro fazer uma função so para buscar todos por id;

    function getProdutoId( $request, $response, $args) {

        $id = $args['id'];
        $query = $this->pdo->prepare('SELECT * FROM produto WHERE id = :id');
        $query->execute(['id' => $id]);
        $dado = $query->fetch(\PDO::FETCH_ASSOC);
        if (empty($dado)) {
            return $response->withJson(['menssagem'=>'Informe o id do usuário!'])->withStatus(404);
        } else {
            return $response->withJson($dado);
        }
    }

    function addProduto($request, $response, $args) {

        $dado = $request->getParsedBody();
        
        if(empty($dado['nome'] && $dado['preco'] && $dado['descricao'] && $dado['quantidade'])){
            $response = $response->withJson(['menssagem'=>' Preencha todos os dados'])->withStatus(411);
            return $response;
        }else{
            $produto = new Produto();
            $baseProduto = new ProdutoModel();
    
            $baseProduto->setNome($dado['nome'])
                        ->setPreco($dado['preco'])
                        ->setDescricao($dado['descricao'])
                        ->setQuantidade($dado['quantidade']);
            $produto->postProduto($baseProduto);
            $response = $response->withJson(['menssagem'=>' Cadastrado com sucesso'])->withStatus(200);
            return $response;
        }

    }

    function putProduto( $request, $response, $args) {
        $dado = $request->getParsedBody();

        if(empty($dado['nome'] && $dado['preco'] && $dado['descricao'] && $dado['quantidade'])){
            $response = $response->withJson(['menssagem'=>' Preencha todos os dados'])->withStatus(411);
            return $response;
        }else{
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
    }

    function dellProduto( $request, $response, $args) {
        $dado = $request->getParsedBody();

        if(empty($dado['id'])){
            $response = $response->withJson(['menssagem' => 'Informe o id do usuário!'])->withStatus(411);
            return $response;
        }else{
        
            $produto = new Produto();
            $baseProduto = new ProdutoModel();

            $baseProduto->setId($dado['id']);

            $produto->dellProduto((int)$baseProduto);
            
            $response = $response->withJson(['menssagem'=>' Deletado com sucesso'])->withStatus(200);
            
            return $response;
        }
    }
}