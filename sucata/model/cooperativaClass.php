<?php
// cooperativa_id int primary key AUTO_INCREMENT,
// cooperativa_name varchar(50) not null,
// cooperativa_cnpj varchar(50) not null,
// cooperativa_cep varchar(50) not null,
// cooperativa_bairro varchar(50) not null,
// cooperativa_logradouro varchar(50) not null,
// cooperativa_localidade varchar(50) not null,
// cooperativa_uf varchar(2) not null,
// cooperativa_complemento varchar(50) not null,
// cooperativa_tel varchar(50) not null,
// vidro bool not null,
// bateria bool not null,
// metal bool not null,
// papel bool not null,
// plastico bool not null

class cooperativaClass
{
    private $name;
    private $cep;
    private $logradouro;
    private $bairro;
    private $localidade;
    private $uf;
    private $complemento;
    private $cnpj;
    private $tel;
    private $vidro;
    private $bateria;
    private $metal;
    private $papel;
    private $plastico;

    // Construtor
    public function __construct(
        $name,
        $cep,
        $logradouro,
        $bairro,
        $localidade,
        $uf,
        $complemento,
        $cnpj,
        $tel,
        $vidro,
        $bateria,
        $metal,
        $papel,
        $plastico
    ) {
        $this->name = $name;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->localidade = $localidade;
        $this->uf = $uf;
        $this->complemento = $complemento;
        $this->cnpj = $cnpj;
        $this->tel = $tel;
        $this->vidro = $vidro;
        $this->bateria = $bateria;
        $this->metal = $metal;
        $this->papel = $papel;
        $this->plastico = $plastico;
    }

     // Getters
     public function getName()
     {
         return $this->name;
     }
 
     public function getCep()
     {
         return $this->cep;
     }
 
     public function getLogradouro()
     {
         return $this->logradouro;
     }
 
     public function getBairro()
     {
         return $this->bairro;
     }
 
     public function getLocalidade()
     {
         return $this->localidade;
     }
 
     public function getUf()
     {
         return $this->uf;
     }
 
     public function getComplemento()
     {
         return $this->complemento;
     }
 
     public function getCnpj()
     {
         return $this->cnpj;
     }
 
     public function getTel()
     {
         return $this->tel;
     }
 
     public function getVidro()
     {
         return $this->vidro;
     }
 
     public function getBateria()
     {
         return $this->bateria;
     }
 
     public function getMetal()
     {
         return $this->metal;
     }
 
     public function getPapel()
     {
         return $this->papel;
     }
 
     public function getPlastico()
     {
         return $this->plastico;
     }
 
     // Setters
     public function setName($name)
     {
         $this->name = $name;
     }
 
     public function setCep($cep)
     {
         $this->cep = $cep;
     }
 
     public function setLogradouro($logradouro)
     {
         $this->logradouro = $logradouro;
     }
 
     public function setBairro($bairro)
     {
         $this->bairro = $bairro;
     }
 
     public function setLocalidade($localidade)
     {
         $this->localidade = $localidade;
     }
 
     public function setUf($uf)
     {
         $this->uf = $uf;
     }
 
     public function setComplemento($complemento)
     {
         $this->complemento = $complemento;
     }
 
     public function setCnpj($cnpj)
     {
         $this->cnpj = $cnpj;
     }
 
     public function setTel($tel)
     {
         $this->tel = $tel;
     }
 
     public function setVidro($vidro)
     {
         $this->vidro = $vidro;
     }
 
     public function setBateria($bateria)
     {
         $this->bateria = $bateria;
     }
 
     public function setMetal($metal)
     {
         $this->metal = $metal;
     }
 
     public function setPapel($papel)
     {
         $this->papel = $papel;
     }
 
     public function setPlastico($plastico)
     {
         $this->plastico = $plastico;
     }
}

