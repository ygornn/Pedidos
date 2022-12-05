<?php 
  include 'header.php'; 
  include 'menu.php'; 
  $connection = Conexao::getInstance();
  $pizza = $connection->query("SELECT * FROM pizza");
  $lanche = $connection->query("SELECT * FROM lanche");
  $bebida = $connection->query("SELECT * FROM bebida");

?>
<div class="meio">
        <img src="<?=URL_BASE . 'assets/img/image 1.png'?>" class="img-fluid mb-5" alt="...">   
  <div class="container">
    <div class="row justify-content-center mt-3">
  <div class="col-6 col-md-3 ms-5  card text-bg-secondary">
      <a href="#pizzas" class="nav-link text-black text-center mt-4"><img src="<?=URL_BASE. 'assets/img/pizza_menu.png '?>" width="230px" alt="">
      <br>Pizzas</a>
  </div>
  <div  class="col-6 col-md-3 ms-5 card ">
      <a href="#lanches" class="nav-link text-black text-center"><img src="<?=URL_BASE . 'assets/img/hamburguer.png'?>" width="160px" alt="">
      <br>Lanches</a>
  </div>
  <div  class="col-6 col-md-3 ms-5 card ">
      <a href="#bebidas" class="nav-link text-black text-center mt-3"><img src="<?=URL_BASE . 'assets/img/coca-cola.png'?>" width="170px" alt="">
      <br>Bebidas</a>
  </div>
    </div>
  </div>

    <main class="flex">
      <form action="pedidos.php" method="post">
      <hr class="mt-5">
    </div>
      <center class="s"><h1 class="pedido">FAÇA SEU PEDIDO</h1></center>
      <div class="row mb-3">
        <?php 
        while($data = $pizza->fetch(PDO::FETCH_ASSOC)){ ?>
        <div id="pizzas" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/' . $data['imagem']?>" id="pizza_img" class="card-image-top" alt="">
            <div class="card-header">
            <?php echo $data['valor']; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['sabor'] ?></h5>
              <p class="card-text truncate-3l"><?php echo $data['descricao'] ?></p>
            </div>
            <div class="card-footer">   
            </div>
          </div>
        </div>
        <?php }?>
        <?php 
        while($data = $lanche->fetch(PDO::FETCH_ASSOC)){ ?>
        <div id="pizzas" class="col-xl-2 col-lg-3 col-md-4 col-sm-6  d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/' . $data['imagem']?>" id="pizza_img" class="card-image-top" alt="">
            <div class="card-header">
            <?php echo $data['valor']; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['sabor'] ?></h5>
              <p class="card-text truncate-3l"><?php echo $data['descricao'] ?></p>
            </div>
            <div class="card-footer">   
            </div>
          </div>
        </div>
        <?php }?>
        <?php 
        while($data = $bebida->fetch(PDO::FETCH_ASSOC)){ ?>
        <div id="pizzas" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/' . $data['imagem']?>" id="pizza_img" class="card-image-top" alt="">
            <div class="card-header">
            <?php echo $data['valor']; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['sabor'] ?></h5>
              <p class="card-text truncate-3l"><?php echo $data['marca'] ?></p>
            </div>
            <div class="card-footer">   
            </div>
          </div>
        </div>
        <?php }?>
      </div>
      </div>
    </form>
    </main>
<?php include 'footer.php'; ?>