<?php 
    $path = '../conf/Conexao.php';
    if(file_exists($path))
    include_once $path;
    $path = '../../conf/Conexao.php';
    if(file_exists($path))
    include_once $path;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=URL_BASE.'assets/css/style.css'?>">
    <link rel="shortcut icon" href="<?=URL_BASE .'assets/img/favicon (3).ico'?>" type="image/x-icon">
    <script src="<?= URL_BASE . '/assets/js/scripts.js'?>" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <title>Pedidos</title>
    <script> 
      const scrollSpy = new bootstrap.ScrollSpy(document.body, {
         target: 'nav' 
       })
     </script>
</head>
<body>