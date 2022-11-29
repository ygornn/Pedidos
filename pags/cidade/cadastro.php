<?php 
    include_once "../header.php";
    include "acao.php"; 

    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT * FROM estado;");

    if($action == "edit"){
        $code = isset($_GET['code']) ? $_GET['code'] : 0;
        $data = findById($code);
        var_dump($data);
    }
?>
    <title>Cadastro de Cidades</title>
</head>
<body>
    <main>
        <h1 class="mt-5 text-center">Cadastro de Cidades</h1>
      <div class="container" style="">
      <form action="<?=URL_BASE . 'pags/cidade/acao.php'?>" method="post">
        <div class='mb-4 col-xl-2'>
          <a href="../product.php" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
          </a>
        </div>
          <div class="d-flex justify-content-center">
            <div class="mb-3 col-xl-3">
                <label class="label-form" for="code">Código</label>
                <input type="text" name="code" id="code" class="form-control" value="<?php if ($action  == "edit") echo $data['idcidade']; else echo 0; ?>" readonly>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="mb-3 col-xl-3">
              <label class="label-form" for="UF"><a href="../estado/cadastro.php">Estado</a></label>
              <select name="uf" id="uf" class="form-select">
                <?php 
                  if($action == 'edit'){
                    $query = $connection->query("SELECT * FROM estado WHERE idestado!={$data['idestado']};");
                    echo "<option value='{$data['idestado']}' selected>{$data['nome_estado']}</option>";
                  }
                  while($line = $query->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$line['idestado']}'>{$line['nome_estado']}</option>";
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="mb-3 col-xl-3">
                <label class="label-form" for="name">Nome da Cidade</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php if ($action == 'edit') echo $data['nome_cidade']; ?>">
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="m-3">
              <a href="cidade.php" class="btn btn-light btn-outline-danger">Consultar</a> 
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