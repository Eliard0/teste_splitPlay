<?php

namespace App\Db;

abstract class Conexao
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $port = '3306';
        $user = 'root';
        $pass = '';
        $dbname = 'splitplay_teste';

        $conn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($conn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}