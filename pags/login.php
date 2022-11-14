<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
<?php

include('acao.php');

session_start();

$_SESSION['logado'] = $_SESSION['logado'] ? : false;
$conteudo = objeto_json();
$p_usuario = isset($_POST['usuario']) ? $_POST['usuario'] : 0;
$p_senha = isset($_POST['senha']) ? $_POST['senha'] : 0;

foreach($conteudo as $key)
{
    $email = $key->email;
    $senha = $key->senha;
    $nome = $key->nome;


    if($p_usuario == $email && $p_senha == $senha)
    {

    $_SESSION['usuario'] = $p_usuario;
    $_SESSION['senha'] = $p_senha;
    $_SESSION['logado'] = true;

    header('location:menu.php');
    }
};

if(!$_SESSION['logado'])
{
    header('location:menu.php');
}





