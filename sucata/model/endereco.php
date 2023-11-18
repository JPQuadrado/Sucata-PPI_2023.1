<?php

// rua
// bairro
// cidade
// uf

class Endereco
{
    public $logradouro;
    public $bairro;
    public $localidade;
    public $uf;
    public $complemento;

    function __construct($logradouro, $bairro, $localidade, $uf)
    {
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->localidade = $localidade;
        $this->uf = $uf;
    }

    function getLogradouro()
    {
        return $this->logradouro;
    }

    function getBairro()
    {
        return $this->bairro;
    }

    function getLocalidade()
    {
        return $this->localidade;
    }

    function getUf()
    {
        return $this->uf;
    }

    function getComplemento()
    {
        return $this->complemento;
    }

    function setClomplemento($complemento)
    {
        $this->complemento = $complemento;
    }
}

// header('Content-Type: application/json; charset=utf-8');
// echo json_encode($endereco);
