<?php 
  include_once '../header.php';
  include_once 'acao.php';
  $connection = Conexao::getInstance();
  $search = isset($_POST['search']) ? $_POST['search'] : '';
  $action = isset($_GET['action']) ? $_GET['action'] : '';
  $sql =
  "SELECT pedido.codigo, nome_cliente, pizza.sabor as pizza, lanche.sabor as lanche, bebida.sabor as bebida, hora,
  pizza.valor*pedido_pizza.quantidade+lanche.valor*pedido_lanche.quantidade+bebida.valor*pedido_bebida.quantidade as total
  FROM pedido JOIN cliente ON pedido.codigo_cliente = cliente.codigo JOIN pedido_pizza ON pedido.codigo=pedido_pizza.codigo_pedido
  JOIN pizza ON pedido_pizza.codigo_pizza = pizza.codigo JOIN pedido_lanche ON pedido.codigo=pedido_lanche.codigo_pedido
  JOIN lanche ON pedido_lanche.codigo_lanche = lanche.codigo JOIN pedido_bebida ON pedido.codigo=pedido_bebida.codigo_pedido
  JOIN bebida ON pedido_bebida.codigo_bebida = bebida.codigo;";
  $query = $connection->query($sql);
?>
<main class="mb-5 pb-5 mb-md-0">
<div class="container">
<h1 class='mt-5'>Pedidos</h1>
<hr>
    <form action="<?=URL_BASE . 'pags/pedidos/acao.php'?>" method="post" enctype="multipart/form-data">
      <div class='mb-4 col-xl-2'>
        <a href="../product.php" class="text-black">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
          </svg>
        </a>
      </div>
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
          <?php if($action == ''){ ?>
          <div class="mt-4">
            <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Avançar</button>
          </div>
          <?php } ?>
        </div>
        </fieldset> 
      </form>
      <div class="row mt-4">
    <?php if($action == 'pizza'){ ?>
      <fieldset>
      <div class="ms-4 mb-4">
        <h5>Escolha de pizzas</h5>
      </div>
      <form action="<?=URL_BASE . 'pags/pedidos/acao.php'?>" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-start ms-4">
          <div class="me-4 mb-3 col-xl-2">
            <label for="code" class="form-label">Pedido</label>
            <select name="ordered" id="ordered" class="form-select">
              <?php tableJoinOrdered(); ?>
            </select>
          </div>
          <div class="me-4 mb-3">
            <label class="label-form" for="pizza_flvor">Sabor</label>
            <select name="pizza_flvor" id="pizza_flvor" class="form-select col-xl-2">
              <?php selectFrom('pizza','codigo', 'sabor', 'valor'); ?>
            </select>
          </div>
          <div class="me-4 col-xl-1">
            <label class="label-form" for="value">Quantidade</label>
            <input type="number" name="pizza_amount" id="pizza_amount" class="form-control" value="<?php if ($action == 'edit') echo $data['valor']; ?>">
          </div>
        </fieldset>
          <div class="mt-4 ms-4">
            <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Avançar</button>
          </div>
    <?php } ?>

    <?php 
    if($action == 'lanche'){ 
      $ordered = isset($_GET['ordered']) ? $_GET['ordered'] : 0;
      ?>
      <fieldset>
      <div class="ms-4 mb-4">
        <h5>Escolha de lanches</h5>
      </div>
      <form action="<?=URL_BASE . 'pags/pedidos/acao.php'?>" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-start ms-4">
          <div class="me-4 col-xl-1">
            <label for="code" class="form-label">Pedido</label>
              <input type="text" class="form-control" name="ordered" id="ordered" value="<?=$ordered?>" readonly>
          </div>
          <div class="me-4 mb-3">
            <label class="label-form" for="snack">Lanche</label>
            <select name="snack" id="snack" class="form-select col-xl-2">
              <?php selectFrom('lanche','codigo', 'sabor', 'valor'); ?>
            </select>
          </div>
          <div class="me-4 col-xl-1">
            <label class="label-form" for="value">Quantidade</label>
            <input type="number" name="amount" id="amount" class="form-control" value="<?php if ($action == 'edit') echo $data['valor']; ?>">
          </div>
        </fieldset>
          <div class="mt-4 ms-4">
            <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Avançar</button>
          </div>
    <?php } ?>

    <?php 
    if($action == 'bebida'){ 
      $ordered = isset($_GET['ordered']) ? $_GET['ordered'] : 0;
      ?>
      <fieldset>
      <div class="ms-4 mb-4">
        <h5>Escolha de lanches</h5>
      </div>
      <form action="<?=URL_BASE . 'pags/pedidos/acao.php'?>" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-start ms-4">
          <div class="me-4 col-xl-1">
            <label for="code" class="form-label">Pedido</label>
              <input type="text" class="form-control" name="ordered" id="ordered" value="<?=$ordered?>" readonly>
          </div>
          <div class="me-4 mb-3">
            <label class="label-form" for="drink">Bebida</label>
            <select name="drink" id="drink" class="form-select col-xl-2">
              <?php selectFrom('bebida','codigo', 'sabor', 'valor'); ?>
            </select>
          </div>
          <div class="me-4 col-xl-1">
            <label class="label-form" for="value">Quantidade</label>
            <input type="number" name="amount" id="amount" class="form-control" value="<?php if ($action == 'edit') echo $data['valor']; ?>">
          </div>
        </fieldset>
          <div class="mt-4 ms-4">
            <button type="submit" class="btn btn-danger" name='action' id='action' value='save'>Avançar</button>
          </div>
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
      <?php 
        while($pizza = $query->fetch(PDO::FETCH_ASSOC)){
          echo "<tr>  <td>{$pizza['codigo']}</td> <td>{$pizza['nome_cliente']}</td> <td>{$pizza['hora']}</td> 
          <td>{$pizza['pizza']}, {$pizza['lanche']}, {$pizza['bebida']}</td> <td>R$ {$pizza['total']}</td>
          <td><a class='btn btn-primary btn-sm' href='show.php?code={$pizza['codigo']}'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard-fill' viewBox='0 0 16 16'>
          <path d='M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z'/>
          </svg></a>
          <a class='btn btn-warning btn-sm' href='cadastro.php?action=edit&code={$pizza['codigo']}'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
          <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
          <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
          </svg></a>
          <a class='btn btn-danger btn-sm'  name='action' id='remove' href='acao.php?action=remove&code={$pizza['codigo']}'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
          <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'
          /></svg></a></td> </tr>";
        }
      ?>
      </tbody>
        </table>
    </div>
  </li>
 </ul>     
      </div>
    </div>  
</main>
<?php include_once '../footer.php'; ?>