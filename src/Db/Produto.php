<?php

namespace Test\Db;

use Test\Models\ProdutoModel;

class Produto extends Conexao{

    public function __construct()
    {
        parent::__construct();
    }

    //Por motivos do alem quando chega no controle não funciona  
    // public function getProdutos():array{
    //     $produto = $this->pdo->query("SELECT id, nome, descricao, preco, quantidade FROM produto;")->fetchAll(\PDO::FETCH_ASSOC);
        
    //     return $produto;
    // }

    public function inserirProduto(ProdutoModel $produto): void{
     
      $query = $this->pdo
      ->prepare('INSERT INTO produto VALUES(
        null,
         :nome,
         :descricao,
         :preco,
         :quantidade);'
        );
        
        $query->execute([
            'nome' => $produto->getNome(),
            'preco' => $produto->getpreco(),
            'descricao' => $produto->getDescricao(),
            'quantidade' => $produto->getQuantidade(),
        ]);
    }
}