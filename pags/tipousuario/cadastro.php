<?php 
    include_once "../header.php";
    include "acao.php"; 
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if($action == "edit"){
        $code = isset($_GET['code']) ? $_GET['code'] : 0;
        $data = findById($code);
    }
?>
    <title>Cadastro</title>
</head>
<body>
    <main>
        <h1 class="mt-5 text-center">Cadastro de Tipos de usuário</h1>
      <div class="container" style="">
      <form action="<?=URL_BASE . 'pags/tipousuario/acao.php'?>" method="post">
        <div class='mb-4 col-xl-2'>
          <a href="../clientes/cadastro.php" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
          </a>
        </div>
          <div class="d-flex justify-content-center">
            <div class="mb-3">
                <label class="label-form" for="code">Código</label>
                <input type="text" name="code" id="code" class="form-control" value="<?php if ($action  == "edit") echo $data['codigo']; else echo 0; ?>" readonly>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="mb-3">
              <label class="label-form" for="description">Descrição</label>
              <input type="text" name="description" id="description" class="form-control" value="<?php if ($action == "edit") echo $data['descricao']; ?>">
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="m-3">
              <a href="tipousuario.php" class="btn btn-light btn-outline-danger">Consultar</a> 
            </div>
            <div class="m-3">
              <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Salvar</button>
            </div>
            </div>
          </div>
          </div>
      </fieldset> 
      </form>
    </main>
    <?php include '../footer.php'; ?>