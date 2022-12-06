<?php 
  include_once '../header.php';
  include_once 'acao.php';
  $connection = Conexao::getInstance();
  $search = isset($_POST['search']) ? $_POST['search'] : '';
  $action = isset($_GET['action']) ? $_GET['action'] : '';
  $next = isset($_GET['next']) ? $_GET['next'] : '';
  
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
    <?php if($next == ''){ ?>

    <form action="<?=URL_BASE . 'pags/pedidos/acao.php'?>" method="post" enctype="multipart/form-data">
    <div class="d-flex justify-content-start ms-4">

      <div class="me-4 mb-3">
        <label class="label-form" for="flavor">Cliente</label>
        <select name="client" id="client" class="form-select">

          <?php selectFrom('cliente', 'codigo', 'nome_cliente', 'email'); ?>

        </select>
      </div>

      <div class="me-4">
        <label class="label-form" for="value">Data e hora do pedido</label>
        <input type="datetime-local" name="datetime" id="datetime" class="form-control" value="<?php if ($action == 'edit') echo $data['valor']; ?>">
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Avançar</button>
      </div>
      <?php } ?>

    <input type="hidden" name="insertIn" id='insertIn' value="pedido">
    </fieldset> 
    </form>

<?php if($next == 'pizza'){ ?>
  <div class="row mt-4">
  <fieldset>

  <div class="ms-4 mb-4">
    <h5>Escolha de pizzas</h5>
  </div>

  <form action="<?=URL_BASE . 'pags/pedidos/acao.php'?>" method="post" enctype="multipart/form-data">
    
  <div class="d-flex justify-content-start ms-4">
      <div class="me-4 mb-3 col-xl-1">
        <label for="orderedCode" class="form-label">Pedido</label>
          <?php getOrderedCode(); ?>
      </div>

      <div class="me-4 mb-3">
        <label class="label-form" for="flavour">Sabor</label>
        <select name="flavour[]" id="flavour[]" class="form-select col-xl-2">

          <?php selectFrom('pizza','codigo', 'sabor', 'valor'); ?>

        </select>
      </div>

      <div class="me-4 col-xl-1">
        <label class="label-form" for="amount">Quantidade</label>
        <input type="number" name="amount" id="amount" class="form-control" value="<?php if ($action == 'edit') echo $data['valor']; ?>">
      </div>

    <input type="hidden" name="insertIn" id='insertIn' value="pizza">
      
      <div class="mt-4 ms-4">
        <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Avançar</button>
      </div>
    </fieldset>
  </form>
    <?php } ?>

    <?php 
    if($next == 'lanche'){ ?>

      <div class="row mt-4">
      <fieldset>
      
      <div class="ms-4 mb-4">
        <h5>Escolha de lanches</h5>
      </div>
      
    <form action="<?=URL_BASE . 'pags/pedidos/acao.php'?>" method="post" enctype="multipart/form-data">
      
    <div class="d-flex justify-content-start ms-4">

      <div class="me-4 col-xl-1">
        <label for="code" class="form-label">Pedido</label>
        <?php getOrderedCode(); ?>
      </div>

      <div class="me-4 mb-3">
        <label class="label-form" for="flavour">Lanche</label>
        <select name="flavour[]" id="flavour[]" class="form-select col-xl-2">
          <?php selectFrom('lanche','codigo', 'sabor', 'valor'); ?>
        </select>
      </div>
      
      <div class="me-4 col-xl-1">
        <label class="label-form" for="value">Quantidade</label>
        <input type="number" name="amount" id="amount" class="form-control" value="<?php if ($action == 'edit') echo $data['valor']; ?>">
      </div>
      
      <input type="hidden" name="insertIn" id='insertIn' value="lanche">
    
      </fieldset>
      
      <div class="mt-4 ms-4">
        <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Avançar</button>
      </div>
    </form>
    <?php } ?>

    <?php 
    if($next == 'bebida'){ ?>
    <div class="row mt-4">

      <div class="ms-4">
        <h5>Escolha de Bebidas</h5>
      </div>

      <form action="<?=URL_BASE . 'pags/pedidos/acao.php'?>" method="post" enctype="multipart/form-data">
      
      <fieldset>

        <div class="d-flex justify-content-start ms-4">

          <div class="me-4 col-xl-1">
            <label for="code" class="form-label">Pedido</label>
            <?php getOrderedCode(); ?>
          </div>

          <div class="me-4 mb-3">
            <label class="label-form" for="flavour">Bebida</label>
            <select name="flavour[]" id="flavour[]" class="form-select col-xl-2">

              <?php selectFrom('bebida','codigo', 'sabor', 'valor'); ?>

            </select>
          </div>

          <div class="me-4 col-xl-1">
            <label class="label-form" for="amount">Quantidade</label>
            <input type="number" name="amount" id="amount" class="form-control" value="<?php if ($action == 'edit') echo $data['valor']; ?>">
          </div>

          <div class="mt-4 ms-4">
            <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Avançar</button>
          </div>

          <input type="hidden" name="insertIn" id='insertIn' value="bebida">

        </fieldset>
    </form>
    <?php } ?>
    </div>

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
          <th>Pedido</th>
          <th>Total do pedido</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php readTablesRows();?>
      </tbody>
        </table>
    </div>
  </li>
 </ul>     
      </div>
    </div>  
</main>
<?php include_once '../footer.php'; ?>