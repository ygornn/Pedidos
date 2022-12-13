<?php
include_once "../../conf/Conexao.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'GET': $action = isset($_GET['action']) ? $_GET['action'] : ""; break;
    case 'POST': $action = isset($_POST['action']) ? $_POST['action'] : ""; break;
};

switch($action){
    case 'remove': remove(); break;
    case 'save': {
        $code = isset($_POST['code']) ? $_POST['code'] : 0;
        if($code == 0)
        create();
        else{
            update();
        }
    } break;
}

function create(){
    $connection = Conexao::getInstance();
    $data = formToArray();

    $sql = "INSERT INTO pedido (codigo_cliente, hora) VALUES ({$data['client']}, '{$data['datetime']}');";
    $query = $connection->query($sql);
    $findLast = $connection->lastInsertId();
    header("location:cadastro.php?action=edit&code=$findLast");
}

// function remove(){
//     $connection = Conexao::getInstance();
    
//     $code = isset($_GET['code']) ? $_GET['code'] : 0;
//     $stmt = $connection->prepare("DELETE FROM pedido
//     WHERE codigo=:code");
//     $stmt->bindParam('code', $code, PDO::PARAM_INT);
//     $stmt->execute();
//     header("location:pedido.php");
// }

function update (){
    $connection = Conexao::getInstance();

    $data = formToArray();
    $verify = findById($data['code']);

    if($verify['cod_pi'] and $verify['cod_lan'] and $verify['cod_beb']){

        $sql = "UPDATE pedido_pizza SET codigo_pizza = {$data['pizza']}, quantidade = {$data['pizza_amount']} WHERE codigo_pedido = {$data['code']};
        UPDATE pedido_lanche SET codigo_lanche = {$data['snack']}, quantidade = {$data['snack_amount']} WHERE codigo_pedido = {$data['code']};
        UPDATE pedido_bebida SET codigo_bebida = {$data['drink']}, quantidade = {$data['drink_amount']} WHERE codigo_pedido = {$data['code']};";
    }else{
        $sql = "INSERT INTO pedido_pizza (codigo_pedido, codigo_pizza, quantidade) VALUES ({$data['code']}, {$data['pizza']},
        {$data['pizza_amount']}); 
        INSERT INTO pedido_lanche (codigo_pedido, codigo_lanche, quantidade) VALUES ({$data['code']}, {$data['snack']},
        {$data['snack_amount']}); 
        INSERT INTO pedido_bebida (codigo_pedido, codigo_bebida, quantidade) VALUES ({$data['code']}, {$data['drink']},
        {$data['drink_amount']});";
    }
    
    $connection->query($sql);

    header("location:cadastro.php");
}

function formToArray(){
    $code = isset($_POST['code']) ? $_POST['code'] : 0;
    $client = isset($_POST['client']) ? $_POST['client'] : '';
    $datetime = strtotime(isset($_POST['datetime']) ? $_POST['datetime'] : 0);
    $pizza = isset($_POST['pizza']) ? $_POST['pizza'] : 0;
    $snack = isset($_POST['snack']) ? $_POST['snack'] : 0;
    $drink = isset($_POST['drink']) ? $_POST['drink'] : 0;
    $pizza_amount = isset($_POST['pizza_amount']) ? $_POST['pizza_amount'] : 0;
    $snack_amount = isset($_POST['snack_amount']) ? $_POST['snack_amount'] : 0;
    $drink_amount = isset($_POST['drink_amount']) ? $_POST['drink_amount'] : 0;

    $data = array(
        'code' => $code,
        'client'=> $client,
        'datetime' => date('Y-m-d h:i:s', $datetime), 
        'pizza' => $pizza,
        'snack' => $snack,
        'drink' => $drink,
        'pizza_amount' => $pizza_amount,
        'snack_amount' => $snack_amount,
        'drink_amount' => $drink_amount
    );

    return $data;
}

function findById($code){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT pedido.codigo, cliente.codigo as cod_cli, cliente.nome_cliente as cliente,
    pizza.codigo as cod_pi, pizza.sabor as pizza, lanche.codigo as cod_lan, lanche.sabor as lanche, bebida.codigo as cod_beb,
    bebida.sabor as bebida, pedido_pizza.quantidade as p_qnt, pedido_lanche.quantidade as l_qnt, pedido_bebida.quantidade as b_qnt, hora,
    pizza.valor*pedido_pizza.quantidade + lanche.valor*pedido_lanche.quantidade + bebida.valor*pedido_bebida.quantidade as total
    FROM pedido JOIN cliente ON pedido.codigo_cliente = cliente.codigo JOIN pedido_pizza ON pedido.codigo=pedido_pizza.codigo_pedido
    JOIN pizza ON pedido_pizza.codigo_pizza = pizza.codigo JOIN pedido_lanche ON pedido.codigo=pedido_lanche.codigo_pedido
    JOIN lanche ON pedido_lanche.codigo_lanche = lanche.codigo JOIN pedido_bebida ON pedido.codigo=pedido_bebida.codigo_pedido
    JOIN bebida ON pedido_bebida.codigo_bebida = bebida.codigo WHERE pedido.codigo=$code;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function readTablesRows($search){
    $connection = Conexao::getInstance();
    $sql = 
    "SELECT pedido.codigo, nome_cliente, pizza.sabor as pizza, lanche.sabor as lanche, bebida.sabor as bebida, pedido_pizza.quantidade as p_qnt,
    pedido_lanche.quantidade as l_qnt, pedido_bebida.quantidade as b_qnt, hora,
    pizza.valor*pedido_pizza.quantidade + lanche.valor*pedido_lanche.quantidade + bebida.valor*pedido_bebida.quantidade as total
    FROM pedido JOIN cliente ON pedido.codigo_cliente = cliente.codigo JOIN pedido_pizza ON pedido.codigo=pedido_pizza.codigo_pedido
    JOIN pizza ON pedido_pizza.codigo_pizza = pizza.codigo JOIN pedido_lanche ON pedido.codigo=pedido_lanche.codigo_pedido
    JOIN lanche ON pedido_lanche.codigo_lanche = lanche.codigo JOIN pedido_bebida ON pedido.codigo=pedido_bebida.codigo_pedido
    JOIN bebida ON pedido_bebida.codigo_bebida = bebida.codigo WHERE nome_cliente LIKE '%$search%';";
    $query = $connection->query($sql);

    while($data = $query->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>  <td>{$data['codigo']}</td> <td>{$data['nome_cliente']}</td> <td>" . date('d/m/Y h:i', strtotime($data['hora'])) . "</td> 
        <td><span style='color: rgb(0, 255, 128)'>{$data['p_qnt']}</span> {$data['pizza']}</td> <td> <span style='color: rgb(0, 255, 128)'>{$data['l_qnt']}</span> {$data['lanche']}</td> <td><span style='color: rgb(0, 255, 128)'>{$data['b_qnt']}</span> {$data['bebida']}</td> <td>R$ {$data['total']}</td>
        <td><a class='btn btn-primary btn-sm' href='show.php?code={$data['codigo']}'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard-fill' viewBox='0 0 16 16'>
        <path d='M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z'/>
        </svg></a>
        <a class='btn btn-warning btn-sm' href='cadastro.php?action=edit&code={$data['codigo']}'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
        </svg></a>
        </td> </tr>";
      }
}