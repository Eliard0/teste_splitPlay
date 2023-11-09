<?php
namespace App\Models;

final class ProdutoModel{

    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $quantidade;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ProdutoModel
    {
        $this->id = $id;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): ProdutoModel
    {
        $this->nome = $nome;
        return $this;
    }

    public function getPreco(): string
    {
        return $this->preco;
    }

    public function setPreco(string $preco): ProdutoModel
    {
        $this->preco = $preco;
        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): ProdutoModel
    {
        $this->descricao = $descricao;
        return $this;
    }
    
    public function getQuantidade(): string
    {
        return $this->quantidade;
    }

    public function setQuantidade(string $quantidade): ProdutoModel
    {
        $this->quantidade = $quantidade;
        return $this;
    }

}