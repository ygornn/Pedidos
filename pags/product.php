<?php include 'header.php'; ?>
<div class="meio">
        <img src="<?=URL_BASE . 'assets/img/image 1.png'?>" class="img-fluid mb-5" alt="...">   
  <div class="container">
    <div class="row justify-content-center mt-3">
  <div class="col-6 col-md-3 mx-2  card text-bg-secondary">
      <a href="#pizzas" class="nav-link text-black text-center mt-4"><img src="<?=URL_BASE. 'assets/img/pizza_menu.png '?>" width="230px" alt="">
      <br>Pizzas</a>
  </div>
  <div  class="col-6 col-md-3 mx-2 card ">
      <a href="#lanches" class="nav-link text-black text-center"><img src="<?=URL_BASE . 'assets/img/hamburguer.png'?>" width="160px" alt="">
      <br>Lanches</a>
  </div>
  <div  class="col-6 col-md-3 mx-2 card ">
      <a href="#bebidas" class="nav-link text-black text-center mt-3"><img src="<?=URL_BASE . 'assets/img/coca-cola.png'?>" width="170px" alt="">
      <br>Bebidas</a>
  </div>
    </div>
  </div>

    <main class="flex-fill">
      <form action="pedidos.php" method="post">
      <hr class="mt-3 p-2 mt-5">
    </div>
      <center class="p-5"><h1 class="pedido">FAÇA SEU PEDIDO</h1></center>
      <div class="row g-3 p-3">
        <div id="pizzas" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/1.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
            R$ 39,90
            </div>
            <div class="card-body">
              <h5 class="card-title">Quatro Queijos</h5>
              <p class="card-text truncate-3l">Molho de tomate, Mussarela, Gorgonzola, Parmesão, Provolone e Oregano.</p>
            </div>
            <div class="card-footer">
                <input type="checkbox" class="btn-check" id="" name="" value="">
                <label class="btn btn-outline-secondary" for="check1"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>                
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/p2.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
            R$ 39,90
            </div>
            <div class="card-body">
              <h5 class="card-title">Bacon em Lascas</h5>
              <p class="card-text truncate-3l">Molho de tomate Fresco, muçarela, Bacon em Lascas e tomates fatiados.</p>
            </div>
            <div class="card-footer">
                <input type="checkbox" class="btn-check btn-outline-secondary" id="check2" name="" value="" >
                <label class="btn btn-outline-secondary" for="check2"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>     
              </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/p3.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
            R$ 39,90
            </div>
            <div class="card-body">
              <h5 class="card-title">Baiana Suprema</h5>
              <p class="card-text truncate-3l">Molho de tomate Fresco, Calabresa Ralada, ovos cozidos, cebola, Pimenta Calabresa e cebola.</p>
            </div>
            <div class="card-footer">              
                <input type="checkbox" class="btn-check" id="check3" name="" value="">
                <label class="btn btn-outline-secondary" for="check3"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>             
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/p4.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
             R$ 39,90
            </div>
            <div class="card-body">
              <h5 class="card-title">Palmito Premium</h5>
              <p class="card-text truncate-3l">Molho de tomate Fresco, Lascas De Palmito, muçarela e azeitonas selecionadas.</p>
            </div>
            <div class="card-footer">            
                <input type="checkbox" class="btn-check" id="check4" name="" value="">
                <label class="btn btn-outline-secondary" for="check4"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/p5.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
              R$ 39,90
            </div>
            <div class="card-body">
              <h5 class="card-title">Portuguesa Especial</h5>
              <p class="card-text truncate-3l">Molho de tomate Fresco, Presunto Na Ponta De Faca, ovos cozidos, cebola, muçarela e azeitonas selecionadas.</p>
            </div>
            <div class="card-footer">
                <input type="checkbox" class="btn-check" id="check5" name="" value="">
                <label class="btn btn-outline-secondary" for="check5"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/p6.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
              R$ 39,90
            </div>
            <div class="card-body">
              <h5 class="card-title">Don Serra</h5>
              <p class="card-text truncate-3l">Molho de tomate Fresco, muçarela, Milho, bacon e tomate cereja.</p>
            </div>
            <div class="card-footer">
                <input type="checkbox" class="btn-check" id="check6" name="" value="">
                <label class="btn btn-outline-secondary" for="check6"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div id="lanches" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/l1.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
              R$ 27,90
            </div>
            <div class="card-body">
              <h5 class="card-title">Salad</h5>
              <p class="card-text truncate-3l">Hambúrguer 120g, Pão de Brioche, Queijo Prato,
                Alface Americano, Tomate, Cebola Roxa, Maionese da Casa</p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check7" name="" value="" >
              <label class="btn btn-outline-secondary" for="check7"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/l2.webp'?>" class="card-image-top"  alt="">
            <div class="card-header">
              R$ 14,90
            </div>
            <div class="card-body">
              <h5 class="card-title">O Baratinho</h5>
              <p class="card-text truncate-3l">Pão de Brioche, Smash 80g, Queijo Prato, Maionese da Casa</p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check8" name="check[]" value="" >
                <label class="btn btn-outline-secondary" for="check8"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/l3.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
             R$ 23,90
            </div>
            <div class="card-body">
              <h5 class="card-title">P.C.Q</h5>
              <p class="card-text truncate-3l">Hambúrguer 120g, Pão de Brioche, Queijo Prato, Maionese da Casa</p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check9" name="check[]" value="" >
                <label class="btn btn-outline-secondary" for="check9"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/l4.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
              R$ 29,90
            </div>
            <div class="card-body">
              <h5 class="card-title">Górgon</h5>
              <p class="card-text truncate-3l">Hambúrguer 160g, Pão de Brioche, Queijo Cheddar, Mussarela Empanada, Creme de Gorgonzola Suave, Bacon Artesanal em Cubos</p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check10" name="check[]" value="" >
                <label class="btn btn-outline-secondary" for="check10"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/l5.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
              R$ 38,90
            </div>
            <div class="card-body">
              <h5 class="card-title">York</h5>
              <p class="card-text truncate-3l">Pão de Brioche, 2x Carnes de 120g, Queijo Cheddar, Bacon Artesanal, Cebola Caramelizada, Maionese da Casa</p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check11" name="check[]" value="">
                <label class="btn btn-outline-secondary" for="check11"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/l6.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
             R$ 26,90
            </div>
            <div class="card-body">
              <h5 class="card-title">Vegetariano</h5>
              <p class="card-text truncate-3l">Hambúrguer de Faláfel 120g feito na Casa, Pão de Brioche, Alface Americano, Tomate, Cebola Roxa, Maionese da Casa</p>
            </div>
            <div class="card-footer">
              <div class="d-block">
                <input type="checkbox" class="btn-check btn-outline-secondary" id="check12" name="check[]" value="">
                <label class="btn btn-outline-secondary" for="check12"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        </div>
        <div id="bebidas" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/b1.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
               R$ 11,00
            </div>
            <div class="card-body">
              <h5 class="card-title">Cerveja Stella Artoes Long Neck 330ML</h5>
              <p class="card-text truncate-3l"></p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check13" name="check[]" value="">
                <label class="btn btn-outline-secondary" for="check13"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/refrigerante-lata.png'?>" height="200px" class="card-image-top" alt="">
            <div class="card-header">
               R$ 6,00
            </div>
            <div class="card-body">
              <h5 class="card-title">Refrigerantes lata 350ML</h5>
              <p class="card-text truncate-3l"></p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check14" name="check[]" value="" >
              <label class="btn btn-outline-secondary" for="check14"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/b3.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
               R$ 7,90
            </div>
            <div class="card-body">
              <h5 class="card-title">H2O 500ML</h5>
              <p class="card-text truncate-3l"></p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check15" name="check[]" value="">
              <label class="btn btn-outline-secondary" for="check15"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/b4.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
              R$ 14,00
            </div>
            <div class="card-body">
              <h5 class="card-title">Refrigerantes 2L</h5>
              <p class="card-text truncate-3l"></p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check16" name="check[]" value="" >
              <label class="btn btn-outline-secondary" for="check16"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/b5.webp'?>" class="card-image-top" alt="">
            <div class="card-header">
             R$ 11,00
            </div>
            <div class="card-body">
              <h5 class="card-title"> Cerveija Heineken Long Neck</h5>
              <p class="card-text truncate-3l"></p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check17" name="check[]" value="" >
              <label class="btn btn-outline-secondary" for="check17"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex alling-itens-stretch">
          <div class="card text-center bg-light">
            <img src="<?=URL_BASE . 'assets/img/18.jpg'?>" class="card-image-top" alt="">
            <div class="card-header">
              R$ 8,00</div>
            <div class="card-body">
              <h5 class="card-title">Refrigerantes 600ML</h5>
              <p class="card-text truncate-3l"></p>
            </div>
            <div class="card-footer">
              <input type="checkbox" class="btn-check btn-outline-secondary" id="check18" name="check[]" value="8.00">
              <label class="btn btn-outline-secondary" for="check18"><img src="<?=URL_BASE . 'assets/img/check.svg'?>" width="20px" alt=""></label><br>
            </div>
          </div>
        </div>
      </div>
      </div>
          <div class="row justify-content-center">
            <button class="btn-outline-secondary mt-5 p-2 col-6" type="submit" value="salvar" id="acao" name="acao">Finalizar pedido</button>
          </div>
    </form>
    </main>
<?php include 'footer.php'; ?>