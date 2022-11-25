<?php 
    include_once "../header.php";
    include "acao.php";

    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if($action == "edit"){
        $code = isset($_GET['code']) ? $_GET['code'] : 0;
        $data = findById($code);
    }
?>
    <title>Cadastro de Lanches</title>
</head>
<body>
    <main>
        <h1 class="mt-5 text-center">Cadastro de Lanches</h1>
        <hr>
      <div class="container" style="">
      <form action="<?=URL_BASE . 'pags/lanche/acao.php'?>" method="post" enctype="multipart/form-data">
        <div class='mb-4 col-xl-2'>
          <a href="../product.php" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
          </a>
        </div>
          <div class="d-flex justify-content-center">
            <div class="me-4">
                <input type="hidden" name="code" id="code" class="form-control" value="<?php if ($action  == "edit") echo $data['codigo']; else echo 0; ?>" readonly>
            </div>
            <div class="me-4 mb-3">
              <label class="label-form" for="flavor">Sabor</label>
              <input type="text" name="flavor" id="flavor" class="form-control" value="<?php if ($action == "edit") echo $data['sabor']; ?>">
            </div>
            <div class="me-4">
                <label class="label-form" for="value">Valor</label>
                <input type="text" name="value" id="value" class="form-control" value="<?php if ($action == 'edit') echo $data['valor']; ?>">
            </div>
            </div>
            <div class="d-flex justify-content-center">
              <div class="col-xl-5 mb-3">
                  <label class="label-form" for="description">Descrição</label>
                  <textarea type="number" name="description" id="description" class="form-control"><?php if ($action == 'edit') echo $data['descricao']; ?></textarea>
              </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="col-xl-5 mb-3">
              <label class="label-form" for="pic">Imagem</label>
              <input type="file" name="pic" id="pic" class="form-control" value="<?php if($action == 'edit') echo $data['imagem'] ?>">
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="m-3">
            <a href="lanche.php" class="btn btn-light btn-outline-danger">Consultar</a> 
          </div>
          <div class="m-3">
            <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Salvar</button>
          </div>
      </fieldset> 
      </form>
    </main>
    <?php include '../footer.php'; ?>