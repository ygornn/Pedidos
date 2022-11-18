<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include_once "../../conf/Conexao.php"; 
    $pdo = Conexao::getInstance();
    $state = $pdo->query("SELECT * FROM estado");
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
    <main class="mb-5 pb-5">
      <div class="container">
        <h1 class="mt-5">Cadastro de Estados</h1>
        <hr>
      <form action="<?=URL_BASE . 'pags/estado/acao.php'?>" method="post">
            <div class="col-sm-12 col-md-6 col-xl-6">
                <fieldset class="row">
                <div class="mb-3 col-xl-5">
                    <label class="label-form" for="UF">UF</label>
                    <input type="text" name="UF" id="UF" class="form-control">
                </div>
                <div class="mb-3 col-xl-5">
                    <label class="label-form" for="name">Nome do Estado</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
              </fieldset>  
          <a href="../index.php" class="btn btn-light btn-outline-danger">Cancelar</a>
          <button type="submit" class="btn btn-danger" name='action' id='action' value='create'>Cadastrar</button>
      </form>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>