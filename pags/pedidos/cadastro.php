<?php 
  include_once '../header.php';
  include_once 'acao.php';
  include '../util.php';

  $connection = Conexao::getInstance();
  $action = isset($_GET['action']) ? $_GET['action'] : '';

  if($action ==  'edit'){
      $code = isset($_GET['code']) ? $_GET['code'] : 0;
      $data = findByid($code);
  }
  
  $search = isset($_POST['search']) ? $_POST['search'] : '';
  
?>
<main class="mb-5 pb-5 mb-md-0">

<div class="container">

<h1 class='mt-5'>Pedidos</h1>

<hr>
    
    <div class='mb-4 col-xl-2'>
      <a href="../product.php" class="text-black">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
      </a>
    </div>

    <div class="row">
    <form action="<?=URL_BASE . 'pags/pedidos/acao.php'?>" method="post" enctype="multipart/form-data">
    <div class="d-flex justify-content-start ms-4">

      <div class="me-4 mb-3">
        <label class="label-form" for="flavor">Cliente</label>
        <select name="client" id="client" class="form-select">

          <?php buildSelect('cliente', 'codigo', 'nome_cliente', $data['cod_cli']); ?>

        </select>
      </div>

      <div class="me-4">
        <label class="label-form" for="value">Data e hora do pedido</label>
        <input type="datetime-local" name="datetime" id="datetime" class="form-control" value="<?php if ($action == 'edit') echo $data['hora']; ?>">
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Cadastrar</button>
        <button class='btn btn-light ms-3'><a style="color: black;" href="pedido.php">Consultar</a></button>
      </div>

    </fieldset> 
    </form>
  </div>
</div>

<?php if($action == 'edit'){ ?>
<div class="ordered">
  <div class="container">
    <div class="row mt-4">

    </div>
    <div class="ms-4 mb-4">
      <h5 style="font-weight: bold;">Itens do pedido</h5>
    </div>
    <!-- <div class="mt-4 ms-4 mb-4">
      <span id="showValue">aa</span>
    </div> -->

    <form action="<?=URL_BASE . 'pags/pedidos/acao.php'?>" method="post" enctype="multipart/form-data">
      
    <input type="hidden" name="code" id="code" value="<?php echo $code?>">

    <div class="d-flex justify-content-start ms-4">

        <div class="me-4 mb-3">
          <label class="label-form" for="pizza">Pizza</label>
          <select name="pizza" id="pizza" class="form-select col-xl-2">

          <?php buildSelect('pizza', 'codigo', 'sabor', $data['cod_pi']); ?>

        </select>
      </div>

      <div class="me-4 col-xl-2">
        <label class="label-form" for="pizza_amount">Quantidade</label>
        <input type="number" name="pizza_amount" id="pizza_amount" class="form-control" value="<?php if ($action == 'edit') echo $data['p_qnt']; ?>">
      </div>
      
    <div class="d-flex justify-content-start">

      <div class="me-4 mb-3">
        <label class="label-form" for="snack">Lanche</label>
        <select name="snack" id="snack" class="form-select col-xl-2">
          <?php buildSelect('lanche', 'codigo', 'sabor', $data['cod_lan']); ?>
        </select>
      </div>
      
      <div class="col-xl-4">
        <label class="label-form" for="value">Quantidade</label>
        <input type="number" name="snack_amount" id="snack_amount" class="form-control" value="<?php if ($action == 'edit') echo $data['l_qnt']; ?>">
      </div>
    </div>
</div>
</div>
    <div class="container mt-3">
    <div class="row">

        <div class="d-flex justify-content-start ms-4">

          <div class="me-4 mb-3">
            <label class="label-form" for="drink">Bebida</label>
            <select name="drink" id="drink" class="form-select col-xl-2">

            <?php buildSelect('bebida', 'codigo', 'sabor', $data['cod_beb']); ?>

            </select>
          </div>

          <div class="me-4 col-xl-2">
            <label class="label-form" for="drink_amount">Quantidade</label>
            <input type="number" name="drink_amount" id="drink_amount" class="form-control" value="<?php if ($action == 'edit') echo $data['b_qnt']; ?>">
          </div>
        </fieldset>
        </div>
        <div class="d-flex justify-content-start">
          <div class="mt-4 ms-4">
            <button type="submit" class="btn btn-light" name='action' id='action' value="save">Cadastrar</button>
          </div>
          </div>
    </form>
  </div>
  </div>
</div>
    <?php } ?>

        <form action="" method="post">
        <div class="d-flex justify-content-end">
            <div>
                <input type="search" id="search" name="search" class="form-control">
            </div>
        <div>
            <button type="submit" class="form-control"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
  </div>
  </div>
  </form>
    <div class='container'>
      <div class="d-flex justify-content-center">
      <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cliente</th>
          <th>Data e hora</th>
          <th>Pizza</th>
          <th>Lanche</th>
          <th>Bebida</th>
          <th>Valor do pedido</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php readTablesRows($search);?>
      </tbody>
        </table>
    </div>
  </li>
 </ul>     
      </div>
    </div>  
</main>
<?php include_once '../footer.php'; ?>