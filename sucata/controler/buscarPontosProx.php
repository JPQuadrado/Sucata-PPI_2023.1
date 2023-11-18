<?php

file_put_contents('debug.txt', print_r($_POST, true));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../conexao.php";
    require_once '../model/pontoClass.php';

    $conn = new Conexao();

    $cep = $_POST['cep'];

    $cepSlit = substr($cep, 0, -5);
    $cepSql .= $cepSlit.'%';

    try {

        $sql = <<<SQL
        SELECT * from ponto where ponto_cep like ?
        SQL;

        // Neste caso utilize prepared statements para prevenir
        // ataques do tipo SQL Injection, pois precisamos
        // cadastrar dados fornecidos pelo usuário 
        $stmt = $conn->conexao->prepare($sql);
        $stmt->execute([$cepSql]);

        if ($stmt->rowCount() > 0){
            $pontos; 
            while($stmt->nextRowset()) {
                $row = $stmt->fetch();

                $ponto = new pontoClass($row['ponto_nome'],
                $row['ponto_cep'],
                $row['ponto_uf'],
                $row['ponto_localidade'],
                $row['ponto_complemento'],
                $row['ponto_logradouro'],
                $row['ponto_bairro'],
                $row['vidro'],
                $row['bateria'],
                $row['metal'],
                $row['papel'],
                $row['plastico'],
                $row['cooperativa_id']);

                array_push($pontos, $ponto);
            }

            echo json_encode($pontos);

        }else {
            echo json_encode("Não foram encontrados pontos proximos");
        }

    } catch (Exception $e) {
        //error_log($e->getMessage(), 3, 'log.php');
        // if ($e->errorInfo[1] === 1062)
        //     exit('Dados duplicados: ' . $e->getMessage());
        // else
        echo json_encode($e->getMessage());
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
}
