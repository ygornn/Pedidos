<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/favicon (3).ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Edição Clientes</title>
    <?php 
    include("acao.php");
    $acao = isset($_GET['acao']) ? $_GET['acao'] : 0; 
    $edicao =  $acao == 'edicao' ? carregar($_GET['item']) : array();
    ?>
</head>
<body class="bd2">
    <center><h1 class="mt-3">EDIÇÃO DE CLIENTES</h1></center>
    <div class="divcliente">
    <hr>
    <div class="row justify-content-center">
      <form class="col-md-10" method="post" action="cliente.php">  
        <fieldset class="fieldcliente"> 
              <label for="id">ID</label>
              <input class="form-control " type="text" name="hide" id="hide" value="<?php if ($acao == 'edicao') echo $edicao->id; else echo 1;?>"> 

              <label for="text" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" value="<?php if ($acao == 'edicao') echo $edicao->nome;?>">

              <label for="cpf" class="form-label">CPF</label>
              <input type="text" class="form-control" id="cpf" name="cpf" value="<?php if ($acao == 'edicao') echo $edicao->cpf;?>">

              <label for="idade" class="form-label">Idade</label>
              <input type="number" class="form-control" id="idade" name="idade" value="<?php if ($acao == 'edicao') echo $edicao->idade;?>">

              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" value="<?php if ($acao == 'edicao') echo $edicao->telefone;?>">

              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php if ($acao == 'edicao') echo $edicao->email;?>">   
              
              <label for="endereco" class="form-label">Endereço</label>
             <input type="text" name="endereco" class="form-control" id="endereco" value="<?php if ($acao == 'edicao') echo $edicao->endereco;?>">
             
             <label for="senha" class="form-label">Senha</label>
             <input type="text" class="form-control" id="senha" name="senha" value="<?php if ($acao == 'edicao') echo $edicao->senha;?>">   
              
             <center class="mt-3">
                <button type="submit" value="salvar" name='acao' id='acao' class="btn btn-success">Salvar Alterações</button>
            </center>
            </form>
            </div>
          </div>
            </div>
</body>
</html>