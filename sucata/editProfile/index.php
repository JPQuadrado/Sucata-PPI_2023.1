<!DOCTYPE html>
<html lang="pt-BR">

<?php
require_once "../model/userClass.php";
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] != "1") {
  header("Location: login.php");
} else {
  $usuario = $_SESSION["usuario"];
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Configurações</title>
</head>

<body>

  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/sucata/listItems/">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
            <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z" />
          </svg>
          <!-- Decidir se deixa o nome ou não -->
          <!-- <span class="w-40 h-40 text-center">Sucata</span> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/sucata/listItems/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/sucata/listUsers/">Usuários</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/sucata/registerItem/">Cadastrar Pontos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/sucata/editProfile/">Configurações</a>
            </li>
          </ul>
          <a href="../controler/sair.php" role="button" class="btn btn-outline-danger m-lg-2">Sair</a>
        </div>
      </div>
    </nav>
  </header>

  <main class="my-5">

    <div class="container light-style flex-grow-1 container-p-y">

      <h4 class="font-weight-bold py-3 mb-4">
      </h4>

      <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
          <div class="col-md-3 pt-0">
            <div class="list-group list-group-flush account-settings-links">
              <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">Geral</a>

              <?php
              require_once "../conexao.php";
              $conn = new Conexao();

              try {
                $sql = <<<SQL
                          SELECT user_id FROM users where cooperativa_id = ? and user_cpf = ?
                          SQL;

                $stmt = $conn->conexao->prepare($sql);
                $stmt->execute([$usuario->getEmpresa(), $usuario->getCpf()]);
              } catch (Exception $e) {
                exit('Ocorreu uma falha: ' . $e->getMessage());
              }

              while ($row = $stmt->fetch()) {
                $user_id = htmlspecialchars($row['user_id']);
              }

              echo <<<HTML

              <a class="list-group-item list-group-item-action text-danger" data-toggle="list" href="../controler/deleteConta.php?id=$user_id" > Deletar conta</a>

              HTML;

              ?>
            </div>
          </div>
          <div class="col-md-9">
            <div class="tab-content">
              <div class="tab-pane fade active show" id="account-general">

                <form id="editForm" action="#" enctype="application/x-www-form-urlencoded">
                  <?php
                  echo <<<HTML
                          <div class="card-body">
                          <div class="form-floating mb-3">
                            <input value="{$usuario->getName()}" type="text" id="nome" class="form-control" placeholder name="nome">
                            <label for="nome">Nome</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input value="{$usuario->getCpf()}" type="text" id="cpf" class="form-control" placeholder name="cpf" readonly>
                            <label for="cpf">CPF</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input value="{$usuario->getEmail()}" type="email" id="email" class="form-control" placeholder name="email">
                            <label for="email">E-mail</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input value="{$usuario->getTel()}" type="text" id="tel" class="form-control" placeholder name="tel">
                            <label for="tel">Telefone</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input name="cep" value="{$usuario->getCep()}" type="text" id="cep" class="form-control" placeholder>
                            <label for="cep">CEP</label>
                          </div>
                          <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control" id="logradouro"
                                    name="logradouro"
                                    value
                                    placeholder
                                    required readonly>
                                <label for="logradouro">Logradouro</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control" id="bairro"
                                    name="bairro"
                                    value
                                    placeholder
                                    required readonly>
                                <label for="bairro">Bairro</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control" id="localidade"
                                    name="localidade"
                                    value
                                    placeholder
                                    required readonly>
                                <label for="localidade">Localidade</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control" id="uf"
                                    name="uf"
                                    value
                                    placeholder
                                    required readonly>
                                <label for="uf">UF</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control" id="complemento"
                                    name="complemento"
                                    value="{$usuario->getComplemento()}"
                                    placeholder
                                    required>
                                <label for="complemento">Complemento</label>
                            </div>

                          <div class="form-floating mb-3">
                            <input value="{$usuario->getEmpresa()}" type="text" id="empresa" class="form-control" placeholder="Company Ltd." readonly name="empresa">
                            <label for="empresa">Empresa</label>
                          </div>

                          <div class="form-floating mb-3">
                            <input value="{$usuario->getPassword()}" type="password" class="form-control" id="oldPassword" readonly name="oldPassword" />
                            <label for="oldPassword">Senha Antiga</label>
                          </div>

                          <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="newPassword" id="newPassword" />
                            <label for="newPassword">Nova Senha</label>
                          </div>

                      HTML;
                  ?>
              </div>
              <!-- <div class="col-md-6">
                <p class="mb-2">Melhorando a senha</p>
                <p class="small text-muted mb-2">Para criar uma nova senha, tenha em mente as boas praticas a seguir:</p>
                <ul class="small text-muted pl-4 mb-0">
                  <li>Mínimo 8 caracteres</li>
                  <li>Pelo menos um caracter especial</li>
                  <li>Pelo menos um número</li>
                </ul>
              </div> -->
            </div>
            <button type="submit" class="btn btn-primary mb-5" id="editForm">Salvar</button>
            </form>
          </div>
        </div>
      </div>
  </main>

  <footer class="footer mt-auto py-3 bg-body-tertiary fixed-bottom">
    <div class="container">
      <span class="text-body-secondary">Projeto Sucata - 2023/1 - PPI</span>
    </div>
  </footer>

  <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
  <script defer src="../jquery-3.7.1.min.js"></script>
  <script defer src="js/script.js"></script>
  <script defer src="js/buscaCep.js"></script>
</body>

</html>