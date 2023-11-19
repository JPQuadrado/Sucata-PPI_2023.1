<?php
file_put_contents('debug.txt', print_r($_POST, true));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../conexao.php";
    require_once '../model/cooperativaClass.php';

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

    $cooperativa = new cooperativaClass($_POST['nome'], $_POST['cepCooperativa'], $_POST['logradouro'], $_POST['bairro'], $_POST['localidade'], $_POST['uf'], $_POST['complemento'], $_POST['cnpj'], $_POST['tel'], $vidro, $bateria, $metal, $papel, $plastico);

    try {

        $sql = <<<SQL
        INSERT INTO cooperativa (cooperativa_name, cooperativa_cnpj, cooperativa_cep, cooperativa_logradouro, cooperativa_bairro, cooperativa_localidade, cooperativa_uf, cooperativa_complemento, cooperativa_tel, vidro, bateria, metal, papel, plastico)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        SQL;

        // Neste caso utilize prepared statements para prevenir
        // ataques do tipo SQL Injection, pois precisamos
        // cadastrar dados fornecidos pelo usuário 
        $stmt = $conn->conexao->prepare($sql);
        $stmt->execute([
            $cooperativa->getName(), 
            $cooperativa->getCnpj(), 
            $cooperativa->getCep(), 
            $cooperativa->getLogradouro(), 
            $cooperativa->getBairro(), 
            $cooperativa->getLocalidade(), 
            $cooperativa->getUf(), 
            $cooperativa->getComplemento(), 
            $cooperativa->getTel(), 
            $cooperativa->getVidro(),
            $cooperativa->getBateria(),
            $cooperativa->getMetal(),
            $cooperativa->getPapel(),
            $cooperativa->getPlastico()
        ]);

        $sql = <<<SQL
        SELECT cooperativa_id from cooperativa where cooperativa_cnpj = ?
        SQL;

        $stmt = $conn->conexao->prepare($sql);
        $stmt->execute([$cooperativa->getCnpj()]);
        $row = $stmt->fetch();

        $message = "Obrigado por participar! Seja bem vinda " . $cooperativa->getName() . ", o codigo para cadestro de funcionarios é: ". $row['cooperativa_id'] . ". Não o perca sem ele não será possivel cadastrar novos funcionarios.";
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
