<?php
class Conexao
{
    public $conexao;

    function __construct()
    {
        if (!isset($this->conexao)) {
            try {
                $this->conexao = new PDO('mysql:host=172.17.0.2;dbname=sucata', 'root', 'password');
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    function fecharConexao()
    {
        if (isset($this->conexao)) {
            $this->conexao = null;
        }
    }
}
