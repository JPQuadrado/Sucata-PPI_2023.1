<?php
file_put_contents('debug.txt', print_r($_POST, true));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../conexao.php";
    require_once '../model/cooperativaClass.php';

    if (isset($_POST['bateria'])) {
        $bateria = true;
    }else{
        $bateria = false;
    }
    if (isset($_POST['metal'])) {
        $metal = true;
    }else{
        $metal = false;
    }
    if (isset($_POST['papel'])) {
        $papel = true;
    }else{
        $papel = false;
    } 
    if (isset($_POST['plastico'])) {
        $plastico = true;
    }else{
        $plastico = false;
    }
    if (isset($_POST['vidro'])) {
        $vidro = true;
    }else{
        $vidro = false;
    }

    $conn = new Conexao();

    $cooperativa = new cooperativaClass($_POST['nome'], $_POST['cepCooperativa'], $_POST['logradouro'], $_POST['bairro'], $_POST['localidade'], $_POST['uf'], $_POST['complemento'], $_POST['cnpj'], $_POST['tel'], $vidro, $bateria, $metal, $papel, $plastico);

    try {

        $sql = <<<SQL
        INSERT INTO cooperativa (cooperativa_name, cooperativa_cep, cooperativa_logradouro, cooperativa_bairro, cooperativa_localidade, cooperativa_uf, cooperativa_complemento, cooperativa_cnpj, cooperativa_tel, vidro, bateria, metal, papel, plastico)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        SQL;

        // Neste caso utilize prepared statements para prevenir
        // ataques do tipo SQL Injection, pois precisamos
        // cadastrar dados fornecidos pelo usuário 
        $stmt = $conn->conexao->prepare($sql);
        $stmt->execute([
            $cooperativa->getName(), $cooperativa->getCep(), $cooperativa->getLogradouro(), $cooperativa->getBairro(), $cooperativa->getLocalidade(), $cooperativa->getUf(), $cooperativa->getComplemento(), $cooperativa->getCnpj(), $cooperativa->getTel(), $cooperativa->getVidro(), $cooperativa->getBateria(), $cooperativa->getMetal(), $cooperativa->getPapel(), $cooperativa->getPlastico()
        ]);

        $message = "Obrigado por participar! Seja bem vinda " . $cooperativa->getName();
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
