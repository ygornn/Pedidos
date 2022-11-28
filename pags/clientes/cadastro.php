<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include_once "../../conf/Conexao.php"; 
    $pdo = Conexao::getInstance();
    $state = $pdo->query("SELECT * FROM estado");
    $city = $pdo->query("SELECT * FROM cidade");
  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=URL_BASE.'assets/css/style.css'?>">
    <link rel="shortcut icon" href="<?=URL_BASE .'assets/img/favicon (3).ico'?>" type="image/x-icon">
    <title>Cadastro</title>
</head>
<body>
    <main class="mb-5 pb-5 mb-md-0">
      <div class="container">
        <h1 class="mt-5">Informe seus dados</h1>
        <hr>
      <form action="<?=URL_BASE . 'pags/clientes/acao.php'?>" method="post">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-6">
                <fieldset class="row">
                    <legend>Dados Pessoais</legend>
                    <div class="d-flex justify-content-start">
                    <div class="mb-3 col-md-6 col-xl-4">
                        <label for="nome" class="form-label">Código</label>
                        <input type="text" name="code" class="form-control" id="code" value="0" readonly>
                    </div>
                    </div>
                    
                    <div class="mb-3 col-md-6 col-xl-4">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-6 col-xl-4">
                        <label for="user" class="form-label">Usuário</label>
                        <input type="text" id="user" name="user" class="form-control" required>
                    </div>

                    <div class=" mb-3 col-md-6 col-xl-4">
                      <label for="date" class="form-label">Data de nascimento</label>
                      <input type="date" class="form-control" name="date" id="date" required>
                    </div>

                    <div class="mb-2 col-xl-5">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="col-md-6 col-xl-4">
                      <label for="password" class="form-label" required>Senha</label>
                      <input type="password" name="password" id="password" class="form-control">
                    </div>
                </fieldset>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-6">
              <fieldset class="row ">

                <legend>Endereço</legend>

                <div class="mb-3 col-xl-3">
                <label for="UF" class="form-label"><a href="../estado/cadastro.php">Estado</a></label>
                  <select name="UF" id="UF" class="form-select" required>
                    <?php 
                        while($uf = $state->fetch(PDO::FETCH_ASSOC)){
                          echo "<option value='{$uf['idestado']}'>{$uf['uf']}</option>";
                        }
                    ?>
                  </select>
                </div>

                <div class="mb-3 col-md-6 col-xl-4">
                <label for="city" class="form-label "><a href="../cidade/cadastro.php">Cidade</a></label>
                  <select name="citys" id="citys" class="form-select">
                    <?php 
                    while($citys = $city->fetch(PDO::FETCH_ASSOC)){
                      echo "<option value='{$citys['idestado']}'>{$citys['nome_cidade']}</option>";
                    } ?>
                  </select>
                </div>

                <label for="address" class="form-label">Insira seu endereço</label>
                <div class="col-xl-7 col-md-6">
                  <input type="text" name="address" class="form-control" id="address" placeholder="Ex: Rua Nascimento Silva N°107" required>
                </div>
                
              </fieldset>  
            </div>
        </div>
        <div class="">
          <a href="../index.php" class="btn btn-light btn-outline-danger">Cancelar</a>
          <button type="submit" class="btn btn-danger" name='action' id='action' value='create'>Finalizar Cadastro</button>
      </form>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>