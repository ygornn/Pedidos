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
      </fieldset> 
      </form>
    </main>
    <?php include '../footer.php'; ?>