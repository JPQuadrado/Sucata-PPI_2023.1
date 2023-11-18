<?php
class Conexao
{
    public $conexao;

    function __construct()
    {
        if (!isset($this->conexao)) {
            try {
                $this->conexao = new PDO('mysql:host=127.0.0.1;dbname=sucata', 'root', 'melo1208');
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
