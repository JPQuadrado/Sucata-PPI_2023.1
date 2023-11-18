<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["senha"])) {

    require_once "../conexao.php";
    require_once "../model/userClass.php";

    $conn = new Conexao();

    $sql = "SELECT * FROM users WHERE user_email = ? and user_password = ?";
    $stmt = $conn->conexao->prepare($sql);

    $resultado = $stmt->execute([$_POST["email"], $_POST["senha"]]);

    if ($stmt->rowCount() == 1) {

        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {

            $usuario = new userClass(
                $rs->user_email,
                $rs->user_password,
                $rs->user_name,
                $rs->user_cep,
                $rs->user_logradouro,
                $rs->user_bairro,
                $rs->user_localidade,
                $rs->user_uf,
                $rs->user_complemento,
                $rs->user_cpf,
                $rs->user_tel,
                $rs->cooperativa_id
            );
        }

        $_SESSION["login"] = "1";
        $_SESSION["usuario"] = $usuario;
        header("Location: ../listItems/index.php");
    } else {
        echo "Usuário ou senha inválidos";
    }
}
