<?php

namespace App\Db;

use App\Models\ProdutoModel;

class Produto extends Conexao{

    public function __construct()
    {
        parent::__construct();
    }

    public function postProduto(ProdutoModel $produto): void{
     
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

    public function updateProduto(ProdutoModel $produto): void
    {
        $statement = $this->pdo
            ->prepare(
            'UPDATE produto SET
                nome = :nome,
                descricao = :descricao,
                preco = :preco,
                quantidade = :quantidade
                WHERE 
                id = :id
            ;');
        $statement->execute([
            'nome' => $produto->getNome(),
            'preco' => $produto->getpreco(),
            'descricao' => $produto->getDescricao(),
            'quantidade' => $produto->getQuantidade(),
            'id' => $produto->getId()
        ]);
    }

    public function dellProduto(int $id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM produto WHERE id = :id;');
        $statement->execute([
            'id' => $id
        ]);
    }
}