<?php
require_once "../model/userClass.php";
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] != "1") {
    header("Location: ../index.html");
} else {
    $usuario = $_SESSION["usuario"];

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];

        require_once "../conexao.php";
        $conn = new Conexao();

        try {
            $sql = <<<SQL
            DELETE FROM ponto WHERE ponto_id = ?
            SQL;

            $stmt = $conn->conexao->prepare($sql);
            $stmt->execute([$id]);

            header("location: ../listItems/index.php");
            exit();
        } catch (Exception $e) {
            header("location: ../listItems/index.php");
            exit('Ocorreu uma falha: ' . $e->getMessage());
        }
    }
}
