<?php
// users (
// 	user_id int primary key,
// 	user_email varchar(50) not null,
// 	user_password varchar(50) not null,
// 	user_name varchar(50) not null,
// 	user_cep varchar(50) not null,
// 	user_logradouro varchar(50) not null,
// 	user_bairro varchar(50) not null,
// 	user_localidade varchar(50) not null,
// 	user_uf varchar(2) not null,
// 	user_complemento varchar(50) not null,
// 	user_cpf varchar(50) not null,
// 	user_tel varchar(50) not null,
// 	user_photo blob,
// 	cooperativa_id int not null,
// 	foreign key (`cooperativa_id`) references cooperativa(cooperativa_id)

class userClass
{
    private $email;
    private $password;
    private $name;
    private $cep;
    private $logradouro;
    private $bairro;
    private $localidade;
    private $uf;
    private $complemento;
    private $cpf;
    private $tel;
    private $empresa;

    public function __construct($email, $password, $name, $cep, $logradouro, $bairro, $localidade, $uf, $complemento, $cpf, $tel, $empresa)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->localidade = $localidade;
        $this->uf = $uf;
        $this->complemento = $complemento;
        $this->cpf = $cpf;
        $this->tel = $tel;
        $this->empresa = $empresa;
    }

    public function reload($conn)
    {
        session_start();

        $sql = "SELECT * FROM users WHERE user_cpf = ?";
        $stmt = $conn->conexao->prepare($sql);

        $stmt->execute([$this->getCpf()]);

        // UPDATE users SET user_email = ?, user_password = ?, user_name = ?, user_tel = ? WHERE user_id = ?

        while ($row = $stmt->fetch()) {
            $user_name = htmlspecialchars($row['user_name']);
            $user_uf = htmlspecialchars($row['user_uf']);
            $user_localidade = htmlspecialchars($row['user_localidade']);
            $user_bairro = htmlspecialchars($row['user_bairro']);
            $user_email = htmlspecialchars($row['user_email']);
            $user_tel = htmlspecialchars($row['user_tel']);
            $user_password = htmlspecialchars($row['user_password']);
            $user_cep = htmlspecialchars($row['user_cep']);
        }

        $usuario = $_SESSION['usuario'];

        $usuario->setName($user_name);
        $usuario->setUf($user_uf);
        $usuario->setLocalidade($user_localidade);
        $usuario->setBairro($user_bairro);
        $usuario->setEmail($user_email);
        $usuario->setTel($user_tel);
        $usuario->setPassword($user_password);
        $usuario->setCep($user_cep);

        $_SESSION["login"] = "1";
        $_SESSION['usuario'] = $usuario;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getLocalidade()
    {
        return $this->localidade;
    }

    public function setLocalidade($localidade)
    {
        $this->localidade = $localidade;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getEmpresa()
    {
        return $this->empresa;
    }

    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }
}
