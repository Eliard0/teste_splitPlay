<?php

namespace Test;

use App\Controllers\ProdutoController;
use PHPUnit\Framework\TestCase;

class ProdutoControlleTest extends TestCase{

    public function testGetProdutos(){

        $produto = new ProdutoController();
        $result = $produto->getProdutos();

        $this->assertTrue($result);
    }

}