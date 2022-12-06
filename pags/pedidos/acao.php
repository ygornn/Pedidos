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
        else {
            update($code);
        }
    }
}

function create(){
    $connection = Conexao::getInstance();
    $data = formToArray();
    
    switch ($data['insertIn']) {
        
        case 'pedido':{
            insertIntoPedido();
            header("location:pedido.php?next=pizza");
        } break;
        
        case 'pizza':{
            insertIntoAssociative('pedido_pizza', 'codigo_pedido', 'codigo_pizza', 'quantidade');
            header("location:pedido.php?next=lanche");
        } break;

        case 'lanche':{
            insertIntoAssociative('pedido_lanche', 'codigo_pedido', 'codigo_lanche', 'quantidade');
            header("location:pedido.php?next=bebida");
        } break;

        case 'bebida':{
            insertIntoAssociative('pedido_bebida', 'codigo_pedido', 'codigo_bebida', 'quantidade');
            header("location:pedido.php");
        } break;
    }
}

// function remove(){
//     $connection = Conexao::getInstance();
    
//     $code = isset($_GET['code']) ? $_GET['code'] : 0;
//     $stmt = $connection->prepare("DELETE FROM pedido WHERE codigo=:code");
//     $stmt->bindParam('code', $code, PDO::PARAM_INT);
//     $stmt->execute();
//     header("location:pedido.php");
// }

// function update ($code){
//     $connection = Conexao::getInstance();

//     $data = formToArray();
//     $sql = "UPDATE pizza SET sabor='{$data['flavor']}', valor={$data['value']}, descricao='{$data['description']}',
//     imagem='{$data['image']}' WHERE codigo={$data['code']};";
//     $connection->query($sql);

//     header("location:pedidp.php");
// }

function formToArray(){
    $code = isset($_POST['code']) ? $_POST['code'] : 0;
    $insertIn = isset($_POST['insertIn']) ? $_POST['insertIn'] : '';
    $client = isset($_POST['client']) ? $_POST['client'] : '';
    $datetime = strtotime(isset($_POST['datetime']) ? $_POST['datetime'] : 0);
    $orderedCode = isset($_POST['orderedCode']) ? $_POST['orderedCode'] : 0;
    $flavour = isset($_POST['flavour']) ? $_POST['flavour'] : '';
    $amount = isset($_POST['amount']) ? $_POST['amount'] : 0;

    $data = array(
        'code' => $code,
        'insertIn' => $insertIn,
        'client'=> $client,
        'datetime' => date('Y-m-d h:i:s', $datetime), 
        'orderedCode' => $orderedCode,
        'flavour' => $flavour,
        'amount' => $amount,
    );

    return $data;
}

function insertIntoPedido(){
    $connection = Conexao::getInstance();
    $data = formToArray();
    $sql = "INSERT INTO pedido (codigo_cliente, hora) VALUES('{$data['client']}', '{$data['datetime']}');";
    $connection->query($sql);
}

function insertIntoAssociative($tableName, $collumnOne, $collumnTwo, $collumnThree){
    $connection = Conexao::getInstance();
    $data = formToArray();

    foreach($data['flavour'] as $value){
        $sql = "INSERT INTO $tableName ($collumnOne, $collumnTwo, $collumnThree) VALUES({$data['orderedCode']},
        {$value}, {$data['amount']});";
        $connection->query($sql);
    }
    
}

// function findById($code){
//     $connection = Conexao::getInstance();
//     $query = $connection->query("SELECT * FROM pedido WHERE codigo=$code;");
//     $data = $query->fetch(PDO::FETCH_ASSOC);
//     return $data;
// }

function selectFrom($table, $collumnOne, $collumnTwo, $collumnThree){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT $collumnOne, $collumnTwo, $collumnThree FROM $table;");
    while($data = $query->fetch(PDO::FETCH_ASSOC)){
        echo "<option value='{$data[$collumnOne]}'>{$data[$collumnTwo]} - {$data[$collumnThree]}</option>";
    }
}

function getOrderedCode(){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT codigo FROM pedido ORDER BY codigo DESC LIMIT 1;");
    $code = $query->fetch(PDO::FETCH_ASSOC);
    echo "<input type='text' name='orderedCode' id='orderedCode' class='form-control' value='{$code['codigo']}' readonly>";
}

function readTablesRows(){
    $connection = Conexao::getInstance();
    $sql =
    "SELECT pedido.codigo, nome_cliente, pizza.sabor as pizza, lanche.sabor as lanche, bebida.sabor as bebida, hora,
    pizza.valor*pedido_pizza.quantidade+lanche.valor*pedido_lanche.quantidade+bebida.valor*pedido_bebida.quantidade as total
    FROM pedido JOIN cliente ON pedido.codigo_cliente = cliente.codigo JOIN pedido_pizza ON pedido.codigo=pedido_pizza.codigo_pedido
    JOIN pizza ON pedido_pizza.codigo_pizza = pizza.codigo JOIN pedido_lanche ON pedido.codigo=pedido_lanche.codigo_pedido
    JOIN lanche ON pedido_lanche.codigo_lanche = lanche.codigo JOIN pedido_bebida ON pedido.codigo=pedido_bebida.codigo_pedido
    JOIN bebida ON pedido_bebida.codigo_bebida = bebida.codigo;";
    $query = $connection->query($sql);

    while($data = $query->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>  <td>{$data['codigo']}</td> <td>{$data['nome_cliente']}</td> <td>" . date('d/m/Y h:i', strtotime($data['hora'])) . "</td> 
        <td>{$data['pizza']}, {$data['lanche']}, {$data['bebida']}</td> <td>R$ {$data['total']}</td>
        <td><a class='btn btn-primary btn-sm' href='show.php?code={$data['codigo']}'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard-fill' viewBox='0 0 16 16'>
        <path d='M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z'/>
        </svg></a>
        <a class='btn btn-warning btn-sm' href='cadastro.php?action=edit&code={$data['codigo']}'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
        </svg></a>
        <a class='btn btn-danger btn-sm'  name='action' id='remove' href='acao.php?action=remove&code={$data['codigo']}'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
        <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'
        /></svg></a></td> </tr>";
      }
}