<?php
file_put_contents('debug.txt', print_r($_POST, true));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../conexao.php";
    require_once '../model/userClass.php';

    $conn = new Conexao();


    // public function __construct($email, $password, $name, $cep, $logradouro, $bairro, $localidade, $uf, $complemento, $cpf, $tel, $empresa)

    $user = new userClass($_POST['email'], $_POST['senha'], $_POST['nome'], $_POST['cepCliente'], $_POST['logradouro'], $_POST['bairro'], $_POST['localidade'], $_POST['uf'], $_POST['complemento'], $_POST['cpf'], $_POST['tel'], $_POST['empresa']);

    try {

        $sql = <<<SQL
        INSERT INTO users (user_email, user_password, user_name, user_cep, user_logradouro, user_bairro, user_localidade, user_uf, user_complemento, user_cpf, user_tel, cooperativa_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        SQL;

        // Neste caso utilize prepared statements para prevenir
        // ataques do tipo SQL Injection, pois precisamos
        // cadastrar dados fornecidos pelo usuário 
        $stmt = $conn->conexao->prepare($sql);
        $stmt->execute([
            $user->getEmail(), $user->getPassword(), $user->getName(), $user->getCep(), $user->getLogradouro(), $user->getBairro(), $user->getLocalidade(), $user->getUf(), $user->getComplemento(), $user->getCpf(), $user->getTel(), $user->getEmpresa()
        ]);

        $message = "Cadastrado com sucesso! Seja bem vindo " . $user->getName();
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
