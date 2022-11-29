<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include_once "../conf/Conexao.php"; 
    session_start();
    if(isset($_SESSION['usuario']))
    header('location:product.php');
  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=URL_BASE.'assets/css/style.css'?>">
    <link rel="shortcut icon" href="<?=URL_BASE .'assets/img/favicon (3).ico'?>" type="image/x-icon">
    <title>Login</title>
</head>
<body class="login">
<div class="main-login">
    <div class="left-login">
    <img src="<?=URL_BASE . 'assets/img/login (2).png'?>" id="img_login" alt="fundo">
    </div>
    <div class="login-card">
       <legend class="mt-5">LOGIN</legend>
<form action='login.php' method='post'>
      <label for="text" class="form-label mt-2">Usuário</label>
      <input type="text" class="form-control" id="user" name='user'>
      <label for="exampleInputPassword1" class="form-label mt-2">Senha</label>
      <input type="password" class="form-control" id="password" name='password'>
    <div class="d-grid col-7 mx-auto mt-5">
        <button class='btn-secondary' type="submit" name="action" id="action" value="login">Entrar</button>
       <h6 class='mt-2'>Não possui cadastro? <a href="clientes/cadastro.php">Cadastre-se</a></h6>
    </div>
</form>
</div>
</div>      
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
