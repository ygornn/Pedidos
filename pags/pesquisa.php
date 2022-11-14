<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
<?php 
$pedido = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : 0;

function pesquisa()
{
  $pesquisa = ucfirst($GLOBALS['pedido']);
  $obj = json_decode(file_get_contents("https://62aa2ec03b31438554438754.mockapi.io/pedido/"),true);
    foreach($obj as $key => $value)
    {
        foreach($value as $value2)
        {
            if(str_contains($value2,$pesquisa))
            {
                echo "<tr>";
                echo "<td>$value[id]</td><td>$value[pedido]</td><td class='dez'>R$$value[valor]</td><td>R$$value[total]</td><td><img src='$value[imagem]' widht='100px' height='100px' alt='img'></td><td><a class='btn btn-danger btn-sm' href='pedidos.php?acao=delete&item='> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'
                /></svg><a></td>";
                echo "</tr>";
            }
        }
    }
}

?>
<table class='table table-hover'>
    <th>N°</th>
    <th>Pedido</th>
    <th>Valor do pedido</th>
    <th>Valor total com desconto</th>
    <th>Foto</th>
    <th></th>
    <?php pesquisa();?>
</table>
</body>
</html>