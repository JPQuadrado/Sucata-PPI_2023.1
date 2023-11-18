<?php
require_once "../model/userClass.php";
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] != "1") {
    header("Location: login.php");
} else {
    $usuario = $_SESSION["usuario"];
}

file_put_contents('debug.txt', print_r($_POST, true));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../conexao.php";
    require_once '../model/pontoClass.php';

    if (isset($_POST['bateria'])) {
        $bateria = 1;
    }else{
        $bateria = 0;
    }
    if (isset($_POST['metal'])) {
        $metal = 1;
    }else{
        $metal = 0;
    }
    if (isset($_POST['papel'])) {
        $papel = 1;
    }else{
        $papel = 0;
    } 
    if (isset($_POST['plastico'])) {
        $plastico = 1;
    }else{
        $plastico = 0;
    }
    if (isset($_POST['vidro'])) {
        $vidro = 1;
    }else{
        $vidro = 0;
    }

    $conn = new Conexao();

    $ponto = new pontoClass($_POST['nome'], $_POST['cep'], $_POST['uf'], $_POST['localidade'], $_POST['complemento'], $_POST['logradouro'], $_POST['bairro'], $vidro, $bateria, $metal, $papel, $plastico, $usuario->getEmpresa());

    try {

        $sql = <<<SQL
        INSERT INTO ponto (ponto_nome, ponto_cep, ponto_uf, ponto_localidade, ponto_complemento, ponto_logradouro, ponto_bairro, vidro, bateria, metal, papel, plastico, cooperativa_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        SQL;

        // Neste caso utilize prepared statements para prevenir
        // ataques do tipo SQL Injection, pois precisamos
        // cadastrar dados fornecidos pelo usuário 
        $stmt = $conn->conexao->prepare($sql);
        $stmt->execute([
            $ponto->getNome(), 
            $ponto->getCep(), 
            $ponto->getUf(),  
            $ponto->getLocalidade(), 
            $ponto->getComplemento(), 
            $ponto->getLogradouro(), 
            $ponto->getBairro(), 
            $ponto->getVidro(),
            $ponto->getBateria(),
            $ponto->getMetal(),
            $ponto->getPapel(),
            $ponto->getPlastico(),
            $ponto->getEmpresa()
        ]);

        $message = "Obrigado por participar! Novo Ponto criado" . $ponto->getNome();
        echo json_encode($message);
        exit();
    } catch (Exception $e) {
        //error_log($e->getMessage(), 3, 'log.php');
        // if ($e->errorInfo[1] === 1062)
        //     exit('Dados duplicados: ' . $e->getMessage());
        // else
        echo json_encode($e->getMessage());
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
}
