<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include_once "../conf/Conexao.php"; ?>
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
      <form action="<?=URL_BASE . 'pags/clientes/cliente.php'?>" method="post">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-6">
                <fieldset class="row">
                    <legend>Dados Pessoais</legend>
                    <div class="mb-3 col-md-6 col-xl-4">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome">
                    </div>
                    <div class="mb-3 col-md-6 col-xl-4 ">
                      <label for="cpf" class="form-label">CPF</label>
                      <input type="text" class="form-control " id="cpf" name="cpf">
                    </div>
                    <div class=" mb-3 col-md-6 col-xl-3">
                      <label for="data" class="form-label">Idade</label>
                      <input type="number" class="form-control" name="idade" id="idade">
                    </div>
                    <div class="mb-3 col-md-8 col-xl-6">
                    <label for="usuario" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3 col-md-6 col-xl-4">
                  <label for="usuario" class="form-label">Telefone</label>
                  <input type="tel" name="telefone" class="form-control" placeholder="(47) 847773290" id="telefone"><br>
              </div>
                </fieldset>
            </div>
            <div class="col-sm-12 col-md-6">
              <fieldset class="row-3">
                <div class="mt-4 mb-3 col-md-6 col-lg-7">
                  <label for="endereco" class="form-label">Insira seu endereço</label>
                  <div class="input-group">
                    <textarea name="endereco" class="form-control" id="endereco"></textarea>
                  <span class="input-group-text p-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-hourglass" viewBox="0 0 16 16">
                    <path d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702c0 .7-.478 1.235-1.011 1.491A3.5 3.5 0 0 0 4.5 13v1h7v-1a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351v-.702c0-.7.478-1.235 1.011-1.491A3.5 3.5 0 0 0 11.5 3V2h-7z"/>
                  </svg>
                  </span>
                </div>
              </div>
              </fieldset>
              <fieldset>
                <div class="mb-3 col-xl-4">
                  <label for="usuario" class="form-label">Senha</label>
                  <input type="password" name="senha" class="form-control" id="senha">
              </div>
              </fieldset>  
            </div>
        </div>
        <div class="mb-3">
          <a href="index.php" class="btn btn-light btn-outline-danger">Cancelar</a>
          <button type="submit" class="btn btn-danger" name='acao' id='acao' value='salvar'>Finalizar Cadastro</button>
      </form>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>