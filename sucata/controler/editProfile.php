<?php
file_put_contents('debug.txt', print_r($_POST, true));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../conexao.php";
    require_once '../model/userClass.php';

    $conn = new Conexao();

    if (!isset($_POST['newPassword'])) {
        $password = $_POST['oldPassword'];
    }else{
        $password = $_POST['newPassword'];
    }

    // public function __construct($email, $password, $name, $cep, $logradouro, $bairro, $localidade, $uf, $complemento, $cpf, $tel, $empresa)

    $user = new userClass($_POST['email'], $password, $_POST['nome'], $_POST['cep'], $_POST['logradouro'], $_POST['bairro'], $_POST['localidade'], $_POST['uf'], $_POST['complemento'], $_POST['cpf'], $_POST['tel'], $_POST['empresa']);

    try {

        $sql1 = <<< SQL
        select user_id from users where user_cpf = ?
        SQL;

        $stmt = $conn->conexao->prepare($sql1);
        $stmt->execute([$user->getCpf()]);
        $row = $stmt->fetch();
        $userID = $row['user_id'];

        $sql = <<<SQL
        UPDATE users SET (user_email, user_password, user_name, user_cep, user_logradouro, user_bairro, user_localidade, user_uf, user_complemento, user_tel)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) WHERE user_id = ?
        SQL;

        // Neste caso utilize prepared statements para prevenir
        // ataques do tipo SQL Injection, pois precisamos
        // cadastrar dados fornecidos pelo usuário 
        $stmt = $conn->conexao->prepare($sql);
        $stmt->execute([
            $user->getEmail(), $user->getPassword(), $user->getName(), $user->getCep(), $user->getLogradouro(), $user->getBairro(), $user->getLocalidade(), $user->getUf(), $user->getComplemento(), $user->getTel()
        ]);

        $message = "Atualização realizada com sucesso!!";
        echo json_encode($message);
        exit();
    } catch (Exception $e) {
        //error_log($e->getMessage(), 3, 'log.php');
        // if ($e->errorInfo[1] === 1062)
        //     exit('Dados duplicados: ' . $e->getMessage());
        // else
        echo json_encode($e->getMessage());
        exit('Falha ao atualizar os dados: ' . $e->getMessage());
    }
}
