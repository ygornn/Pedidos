<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php 
    include_once "../../conf/Conexao.php"; 
    include 'acao.php';
    $pdo = Conexao::getInstance();
    $state = $pdo->query("SELECT * FROM estado;");
    $city = $pdo->query("SELECT * FROM cidade");
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if($action == 'edit'){
      $code = isset($_GET['code']) ? $_GET['code'] : 0;
      $data = findById($code);
    }
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
      <div class="row">
      <div class='mb-2 mt-4 col-xl-2'>
        <a href="../index.php" class="text-black">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
          </svg>
        </a>
      </div>
      <div class="d-flex justify-content-center">
        <h1 class="mb-5">Insira seu endereço</h1>
        <form action="<?=URL_BASE . 'pags/endereco/acao.php'?>" method="post">
      </div>
      <fieldset>  
      <div class="d-flex justify-content-center">
        <div class="col-md-6 col-xl-2 ps-4">
          <label for="code" class="form-label">Código</label>
          <input type="text" name="code" class="form-control" id="code" value="<?php if($action == 'edit') echo $data['idendereco']; else echo 0; ?>" readonly>
        </div>
        <div class="mb-4 col-xl-2 me-5 ps-5">
        <label for="city" class="form-label "><a href="../cidade/cadastro.php">Cidade</a></label>
          <select name="city" id="city" class="form-select">
            <?php 
            if($action == 'edit'){
              $city = $pdo->query("SELECT * FROM cidade WHERE idcidade!={$data['idcidade']};");
              echo "<option value='{$data['idcidade']}' selected>{$data['nome_cidade']}</option>";
            }
            while($citys = $city->fetch(PDO::FETCH_ASSOC)){
              echo "<option value='{$citys['idcidade']}'>{$citys['nome_cidade']}</option>";
            } ?>
          </select>
        </div>
        </div>
      </div>
      <div class="d-flex justify-content-center mt-4">
        
        <div class="mb-4 col-md-6 col-xl-4 pe-4">
        <label for="address" class="form-label">Insira seu endereço</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Ex: Rua Nascimento Silva N°107"
            value="<?php if($action == 'edit') echo $data['nome_endereco'] ?>" required>
          </div>
        </div>
        </div>
      <div class="d-flex justify-content-center mt-3">
        <div class="col-xl-2 ps-4">
          <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Finalizar cadastro</button>
        </div>
        </div>
  </fieldset>
  </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>