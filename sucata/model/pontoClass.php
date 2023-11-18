<?php

    // ponto_nome varchar(50) not null,
	// ponto_cep varchar(50) not null,
	// ponto_uf varchar(50) not null,
	// ponto_localidade varchar(50) not null,
	// ponto_complemento varchar(50) not null,
	// ponto_logradouro varchar(50) not null,
	// user_bairro VARCHAR(50) NOT NULL,
	// vidro bool not null,
	// bateria bool not null,
	// metal bool not null,
	// papel bool not null,
	// plastico bool not null,
	// cooperativa_id INT NOT NULL,
    // FOREIGN KEY (cooperativa_id) REFERENCES cooperativa(cooperativa_id)


class pontoClass
    {
        private $nome;
        private $cep;
        private $uf;
        private $localidade;
        private $complemento;
        private $logradouro;
        private $bairro;
        private $vidro;
        private $bateria;
        private $metal;
        private $papel;
        private $plastico;
        private $empresa;
    
        // Constructor
        public function __construct(
            $nome, $cep, $uf, $localidade, $complemento, 
            $logradouro, $bairro, $vidro, $bateria, $metal, 
            $papel, $plastico, $empresa
        ) {
            $this->nome = $nome;
            $this->cep = $cep;
            $this->uf = $uf;
            $this->localidade = $localidade;
            $this->complemento = $complemento;
            $this->logradouro = $logradouro;
            $this->bairro = $bairro;
            $this->vidro = $vidro;
            $this->bateria = $bateria;
            $this->metal = $metal;
            $this->papel = $papel;
            $this->plastico = $plastico;
            $this->empresa = $empresa;
        }
    
            // Getters
    public function getNome()
    {
        return $this->nome;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function getLocalidade()
    {
        return $this->localidade;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function getBairro()
    {
        return $this->bairro;
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

    public function getEmpresa()
    {
        return $this->empresa;
    }

    // Setters
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function setLocalidade($localidade)
    {
        $this->localidade = $localidade;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
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

    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }
}