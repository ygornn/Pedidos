<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon (3).ico" type="image/x-icon">
    <title>Pedidos</title>
    <?php
  
    if((isset($_POST['acao']) && $_POST['acao'] == 'salvar'))
    {
     if($_POST['check'] !== null)
      {
        $valor = isset($_POST['check']) ? $_POST['check'] : 0;
        $soma = array_sum($valor);
        $total = desconto($soma);

        $nome = isset($_POST['nome']) ? $_POST['nome'] : 0;
        $implode_nome = implode(", ", $nome);
        
        $pedidos = 
        [  
          "id"    => date("is"),
          "nome"  => $implode_nome,
          "pedido"=> $soma,
          "total" => $total
        ];

        armazenar_pedidos($pedidos);
      }
      else
      {
        header("location:menu.php");
      }
    };

 if ((isset($_GET['acao'])) && $_GET['acao'] == 'delete') 
   {
    delete($_GET['item']);
   };

  function armazenar_pedidos($array)
    {
      $conteudo_json = objeto_pedidos();

      array_push($conteudo_json,$array);

      $json = json_encode($conteudo_json, JSON_PRETTY_PRINT);

      $arquivo = fopen('pedidos.json',"w");

      fwrite($arquivo,$json);
      fclose($arquivo);
    };

  function objeto_pedidos ()
    {
     $fg = json_decode(file_get_contents("https://62aa2ec03b31438554438754.mockapi.io/pedido/"));

      if ($fg == null) 
      {
        return array();
      } else 
      {
        return $fg;
      }
    };

  function delete($array)
  {
     $obj = objeto_pedidos();
     $delete = [];
 
     for ($i=0; $i <count($obj) ; $i++) 
     { 
       if ($obj[$i]->id != $array) 
       {
         array_push($delete, $obj[$i]);
       }
     };
     $json = json_encode($delete, JSON_PRETTY_PRINT);
     $arquivo = fopen('pedidos.json',"w");
     fwrite($arquivo,$json);
     fclose($arquivo);
     header("location:pedidos.php");
   };

   function desconto ($total)
    {
      if($total > 100 && $total < 150)
      {
        $desconto = $total * 0.90;
        return "<td class='dez'> R$" . $desconto . "</td><td>10%</td>";
      }
      elseif($total > 150 && $total < 200)
      {
        $desconto = $total * 0.80;
        return "<td class='vinte'>R$" . $desconto . "</td><td>20%</td>";
      }
      elseif($total > 200)
      {
        $desconto = $total * 0.70;
        return "<td class='trinta'>R$" . $desconto . "</td><td>30%</td>";
      } else
      {
        $desconto = $total; 
        return "<td>R$$desconto</td><td>0%</td>";
      }
    }

   function gerar_tabela_pedidos()
    {
      $obj = objeto_pedidos();
      
        foreach ($obj as $key => $value) 
        {
            echo "<tr>";
            echo "<td>$value->id</td><td>$value->pedido</td><td class='dez'>R$$value->valor</td><td>R$$value->total</td><td><img src='$value->imagem' widht='100px' height='100px' alt='img'></td><td><a class='btn btn-danger btn-sm' href='pedidos.php?acao=delete&item=".$value->id."'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
            <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'
            /></svg><a></td>";
          echo "</tr>";
        } 
    }
    ?>
</head>
<body>
  <nav class="navbar navbar-light bg-light mb-5">
        <div class="container-fluid">
          <nav class="navbar navbar-light bg-light">
          </nav>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="menu.php">Home</a>
                </li>
            <li class="nav-item">
              <a class="nav-link" href="cliente.php">Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pedidos.php">Pedidos</a>
            </li>
             </ul>
            </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>      
    <main class="mb-5 pb-5 mb-md-0">
      <div class="container">
        <h1>Pedidos</h1>
        <hr>
        <form method='post' action='pesquisa.php'>
        <input type='search' name='pesquisa' id='pesquisa'>
        <input type='submit' value='pesquisar'>
        </form>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Pedido</th>
                  <th>Valor do Pedido</th>
                  <th>Valor total com desconto</th>
                  <th>Foto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
               <?php gerar_tabela_pedidos();?>
              </tbody>
            </table>
          <a href="menu.php" class="btn btn-danger">Retornar</a>
        </div>
      </li>
     </ul>       
      </div>
    </main>

    <footer class="border-top fixed-bottom text-muted bg-light">
      <div class="container">
        <div class="row py-1">
          <div class= "col-6 col-md-3 text-left text-md-left">
             &copy; 2022 - Pedidos
          </div>
        </div>
      </div>

    </footer>

  </body>
</html>