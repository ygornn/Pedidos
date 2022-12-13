<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include_once "../../conf/Conexao.php"; 
  include "acao.php";
  include "../util.php";
    $pdo = Conexao::getInstance();

    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if($action == "edit"){
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
        <h1 class="mb-5"><?php if($action == 'edit') echo "Edição usuários"; else echo "Insira seus dados" ?></h1>
        <form action="<?=URL_BASE . 'pags/clientes/acao.php'?>" method="post">
      </div>
      <fieldset>  
      <div class="d-flex justify-content-center">
        <div class="col-md-6 col-xl-2 ps-4">
          <label for="code" class="form-label">Código</label>
          <input type="text" name="code" class="form-control" id="code" value="<?php if($action == 'edit') echo $data['codigo']; else echo 0; ?>" readonly>
        </div>
      <div class="col-md-6 col-xl-3 px-4">
          <label for="usertype" class="form-label"><a href="../tipousuario/tipousuario.php">Tipo usuário</a></label>
          <select name="usertype" id="usertype" class="form-select">
            <?php 
              buildSelect('tipoUsuario', 'codigo', 'descricao', $data['codigo_tipousuario']);
            ?>
          </select>
        </div>
      </div>
      <div class="d-flex justify-content-center mt-4">
        <div class="mb-4 col-md-6 col-xl-2 me-5">
          <label for="name" class="form-label">Nome</label>
          <input type="text" id="name" name="name" class="form-control" value="<?php if($action == 'edit') echo $data['nome_cliente'] ?>" required>
        </div>

        <div class="mb-4 col-md-6 col-xl-2">
            <label for="user" class="form-label">Usuário</label>
            <input type="text" id="user" name="user" class="form-control" value="<?php if($action == 'edit') echo $data['usuario']; ?>" required>
        </div>
        </div>
        </div>
      <div class="d-flex justify-content-center">
      <div class="col-md-6 col-xl-2 ps-4">
        <label for="date" class="form-label">Data de nascimento</label>
        <input type="date" class="form-control" name="date" id="date" value="<?php if($action == 'edit') 
        echo $data['data_nascimento']; ?>"  required>
      </div>

      <div class="col-xl-3 px-4">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" id="email" name="email" value="<?php if($action == 'edit') echo $data['email']; ?>"  required>
      </div>
      </div>
      <?php if($action == '') {?>
      <div class="container">
        <div class="col-10">
          <div class="d-flex justify-content-center">
            <div class="col-md-6 col-xl-3 mt-4">
              <label for="password" class="form-label" required>Senha</label>
              <input type="password" name="password" id="password" class="form-control">
            </div>
        </div>
      </div>
      <?php } else{?>
        <div class="container">
        <div class="col-10">
          <div class="d-flex justify-content-center">
            <div class="col-md-6 col-xl-3 mt-4">
              <label for="address" class="form-label" required>Endereço</label>
              <select name="address" id="address" class="form-select">
                <?php
                    buildSelect('endereco', 'idendereco', 'nome_endereco', $data['idendereco'])
                 ?>
              </select>
            </div>
        </div>
      </div>
      <?php } ?>
      <div class="d-flex justify-content-end">
      <div class='mb-4 col-xl-2'>
      <button type="submit" name="action" id="action" value="save" style="border: none; background: white;"><?php if($action == 'edit') echo "Editar"; else echo "Prosseguir"; ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
        </svg>
      </button>
    </div>
    </div>
    </div>
  </fieldset>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>