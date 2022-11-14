<?php
if ((isset($_POST['acao'])) && ($_POST['acao'] == 'salvar'))
{
  if ($_POST['hide'] == 1) 
 {
   $pessoa = 
   [ "id" => date("is"),
     "nome"=> $_POST['nome'],
     "cpf"=>$_POST['cpf'],
     "idade"=>$_POST['idade'],
     "telefone"=>$_POST['telefone'],
     "email"=>$_POST['email'],
     "endereco"=>$_POST['endereco'],
     "senha"=>$_POST['senha']
   ];
   salvar($pessoa);
 }
 else 
 {
  $pessoa = 
  [ "id" => $_POST['hide'],
    "nome"=> $_POST['nome'],
    "cpf"=>$_POST['cpf'],
    "idade"=>$_POST['idade'],
    "telefone"=>$_POST['telefone'],
    "email"=>$_POST['email'],
    "endereco"=>$_POST['endereco'],
    "senha"=>$_POST['senha']
  ];
    editar($pessoa);
 }
  };

  if ((isset($_GET['acao'])) && $_GET['acao'] == 'delete'){
  delete($_GET['item']);
  };

  function editar($array){
    
    $obj = objeto_json();
  
    for ($i=0; $i <count($obj) ; $i++) 
    { 
      if ($obj[$i]->id == $array['id']) 
      {
        $obj[$i]->id = $array['id'];
        $obj[$i]->nome = $array['nome'];
        $obj[$i]->cpf = $array['cpf'];
        $obj[$i]->idade = $array['idade'];
        $obj[$i]->telefone = $array['telefone'];
        $obj[$i]->email = $array['email'];
        $obj[$i]->endereco = $array['endereco'];
        $obj[$i]->senha = $array['senha'];
      }
      $dados_json = json_encode($obj,  JSON_PRETTY_PRINT);
      $fp = fopen("cliente.json", "w");
      fwrite($fp, $dados_json);
      fclose($fp);
      header("location:cliente.php");
    }
  };
  
  function salvar($novo)
  {
    
    $dados = objeto_json();
    array_push($dados,$novo);
    
    $dados_json = json_encode($dados, JSON_PRETTY_PRINT);
    $fp = fopen("cliente.json", "w");

    fwrite($fp, $dados_json);
    fclose($fp);
    header("location:cliente.php");
  };

  function carregar($id)
  {
    $arquivo = file_get_contents('cliente.json');
    $json = json_decode($arquivo);
  
    foreach ($json as $key) {
      if ($key->id == $id)
        return $key;
    }
  };
  
  function objeto_json ()
  {
    $fg = file_get_contents('cliente.json',"w");

    $obj = json_decode($fg);

    if ($obj == null) 
    {
      return array();
    } else 
    {
      return $obj;
    }
  };


 function delete($info)
 {
    $obj = objeto_json();
    $delete = [];

    for ($i=0; $i <count($obj) ; $i++) 
    { 
      if ($obj[$i]->id != $info) 
      {
        array_push($delete, $obj[$i]);
      }
    };
    $json = json_encode($delete, JSON_PRETTY_PRINT);
    $arquivo = fopen('cliente.json',"w");
    fwrite($arquivo,$json);
    fclose($arquivo);
    header("location:cliente.php");
  };

  function gerar_tabela()
  {
    $obj = objeto_json();
      foreach ($obj as $key => &$value) 
      {
        echo "<tr>";
        if ($value->idade >= 18) 
        {
          echo "<td><i class=''>$value->id</i></td>" . "<td>$value->nome</td>" . "<td>$value->cpf</td>" . "<td><i class='maior'>$value->idade</i></td>" . "<td>$value->telefone</td>" . "<td>$value->email</td>" . "<td>$value->endereco</td>" . 
          "<td><a class='btn btn-danger btn-sm'  name='acao' href='cliente.php?acao=delete&item=".$value->id."'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
          <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'
          /></svg><a></td>
          <td><a class='btn btn-primary btn-sm' name='tarefa' href='edicao_cliente.php?acao=edicao&item=".$value->id."'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
          <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
          </svg></a></td>";
        } else 
        {
          echo "<td><i class=''>$value->id</i></td>" . "<td>$value->nome</td>" . "<td>$value->cpf</td>" . "<td><i class='menor'>$value->idade</i></td>" . "<td>$value->telefone</td>" . "<td>$value->email</td>" . "<td>$value->endereco</td>" . 
          "<td><a class='btn btn-danger btn-sm' name='acao' href='cliente.php?acao=delete&item=".$value->id."'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
          <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'
          /></svg><a></td>
          <td><a class='btn btn-primary btn-sm' name='acao' href='edicao_cliente.php?acao=edicao&item=".$value->id."'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
          <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
          </svg></a></td>"; 
        }
      }
    echo "</tr>";
  };
?>
    