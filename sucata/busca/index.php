<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucata</title>


    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/style.css">
    <!-- BAIXAR PACOTE DPS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

</head>

<body class="my-lg-5">
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/sucata/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-recycle" viewBox="0 0 16 16">
                        <path
                            d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z" />
                    </svg>
                    <!-- Decidir se deixa o nome ou não -->
                    <!-- <span class="w-40 h-40 text-center">Sucata</span> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/sucata/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/sucata/sobre/">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/sucata/busca/">Busca</a>
                        </li>
                    </ul>
                    <a href="/sucata/listItems/" role="button" class="btn btn-outline-light m-lg-2">Area Privada</a>
                    <a href="/sucata/conta/login/" role="button" class="btn btn-outline-success m-lg-2">Entrar</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container col-xxl-8 px-4 py-5">

        <p class="lead text-center fw-bolder">Busque pontos de coletas na sua região, digite o seu CEP.</p>

        <form class="d-flex mt-3 mt-lg-0" role="search" enctype="application/x-www-form-urlencoded" method="post"
            action="" id="pontos">
            <input class="form-control me-2" type="search" placeholder="00000-000" aria-label="Search"
                pattern="\d{5}-\d{3}" name="cep" required>
            <button class="btn btn-success" type="submit" id="pontos">Buscar</button>
        </form>
    </div>


    <!-- Resultados -->
    <div class="container px-5 py-5" id="featured-3">
        <h3 class="pb-2 border-bottom">Resultados</h3>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cep"])){
                require_once "../conexao.php";
                $conn = new Conexao();

                $cep = $_POST["cep"];
                $cepSplit = substr($cep, 0, -5);
                $queryStr = $cepSplit.'%';

                try {
                    $sql = <<<SQL
                    SELECT * FROM ponto where ponto_cep like ? 
                    SQL;

                    $stmt = $conn->conexao->prepare($sql);
                    $stmt->execute([$queryStr]);
                } catch (Exception $e) {
                    exit('Ocorreu uma falha: ' . $e->getMessage());
                }
                ?>

                <table id="pontos" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>CEP</th>
                            <th>Nome</th>
                            <th>UF</th>
                            <th>Localidade</th>
                            <th>Bairro</th>
                            <th>Logradouro</th>
                            <th>Complemento</th>
                            <th>Vidro</th>
                            <th>Bateria</th>
                            <th>Metal</th>
                            <th>Papel</th>
                            <th>Plastico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {
                            $ponto_cep = htmlspecialchars($row['ponto_cep']);
                            $ponto_nome = htmlspecialchars($row['ponto_nome']);
                            $ponto_uf = htmlspecialchars($row['ponto_uf']);
                            $ponto_localidade = htmlspecialchars($row['ponto_localidade']);
                            $ponto_bairro = htmlspecialchars($row['ponto_bairro']);
                            $ponto_logradouro = htmlspecialchars($row['ponto_logradouro']);
                            $ponto_complemento = htmlspecialchars($row['ponto_complemento']);
                            $vidro = htmlspecialchars($row['vidro']);
                            $bateria = htmlspecialchars($row['bateria']);
                            $metal = htmlspecialchars($row['metal']);
                            $papel = htmlspecialchars($row['papel']);
                            $plastico = htmlspecialchars($row['plastico']);

                            if ($vidro == 1) {
                                $msgVidro = "&#128309;";
                            } else {
                                $msgVidro = "&#128308;";
                            }

                            if ($bateria == 1) {
                                $msgBateria = "&#128309;";
                            } else {
                                $msgBateria = "&#128308;";
                            }

                            if ($metal == 1) {
                                $msgMetal = "&#128309;";
                            } else {
                                $msgMetal = "&#128308;";
                            }

                            if ($papel == 1) {
                                $msgPapel = "&#128309;";
                            } else {
                                $msgPapel = "&#128308;";
                            }

                            if ($plastico == 1) {
                                $msgPlastico = "&#128309;";
                            } else {
                                $msgPlastico = "&#128308;";
                            }

                            echo <<<HTML
                        <tr>
                            <td>$ponto_cep</td>
                            <td>$ponto_nome</td>
                            <td>$ponto_uf</td>
                            <td>$ponto_localidade</td>
                            <td>$ponto_bairro</td>
                            <td>$ponto_logradouro</td>
                            <td>$ponto_complemento</td>
                            <td>$msgVidro</td>
                            <td>$msgBateria</td>
                            <td>$msgMetal</td>
                            <td>$msgPapel</td>
                            <td>$msgPlastico</td>
                        </tr>
                        HTML;
                        }
                    }
                        ?>

    </div>

    <!--
        Descer Footer
    -->
    <footer class="footer mt-auto py-3 bg-body-tertiary fixed-bottom">
        <div class="container">
            <span class="text-body-secondary">Projeto Sucata - 2023/1 - PPI</span>
        </div>
    </footer>


    <script src="../bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
     <!-- BAIXAR PACOTE DPS -->
     <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="js/table.js"></script>
</body>

</html>