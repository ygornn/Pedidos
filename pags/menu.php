<?php 

  $path = '../conf/Conexao.php';
  if(file_exists($path)){
    include_once $path;
  }
  $path = '../../conf/Conexao.php';
  if(file_exists($path)){
    include_once $path;
  }
?>
<nav id="nav" class="navbar navbar-expand navbar-light bg-light border-bottom shadow-sm mb-1 ">
    <div class="container">
      <ul class="navbar-nav  justify-content-center">
        <li class="nav-item">
          <a href="product.php" class="nav-link">Ínicio</a>
        </li>
        <li class="nav-item">
          <a href="pizza/cadastro.php" class="nav-link">Pizzas</a>
        </li>
        <li class="nav-item">
          <a href="lanche/cadastro.php" class="nav-link">Lanches</a>
        </li>
        <li class="nav-item">
          <a href="bebida/cadastro.php" class="nav-link">Bebidas</a>
        </li>
      </ul>
    <div class="d-flex justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="pedidos.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
          </a>
        </li>
        <li class="nav-item">
          <a href="clientes/cliente.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
          </a>
        </li>
        <li class="nav-item mt-3 justify-content-end">
          <h6>Olá <?php echo $_SESSION['usuario']; ?></h6>
        </li>
          <li class="nav-item">
          <a href='login.php?action=logoff' class='nav-link'>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg>
            </a>
          </li>
        </ul>     
        </div>
    </div>
    </div>
  </nav>        