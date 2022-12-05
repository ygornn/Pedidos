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

    if($data['pizza_flvor'] != ''){
        $sql = "INSERT INTO pedido_pizza (codigo_pedido, codigo_pizza, quantidade) VALUES({$data['ordered']},
        {$data['pizza_flvor']}, {$data['pizza_amount']});";
        $connection->query($sql);
    
         header("location:pedido.php?action=lanche&ordered={$data['ordered']}");
    }
    elseif($data['snack'] != ''){
        $sql = "INSERT INTO pedido_lanche (codigo_pedido, codigo_lanche, quantidade) VALUES({$data['ordered']},
        {$data['snack']}, {$data['snack_amount']});";
        $connection->query($sql);
    
         header("location:pedido.php?action=bebida&ordered={$data['ordered']}");
    }
    elseif($data['drink'] != ''){
        $sql = "INSERT INTO pedido_bebida (codigo_pedido, codigo_bebida, quantidade) VALUES({$data['ordered']},
        {$data['drink']}, {$data['drink_amount']});";
        $connection->query($sql);
    
         header("location:pedido.php");
    }else{
        $sql = "INSERT INTO pedido (codigo_cliente, hora) VALUES('{$data['client']}',
        '{$data['datetime']}');";
        $connection->query($sql);
    
         header("location:pedido.php?action=pizza");
    }
}

function remove(){
    $connection = Conexao::getInstance();
    
    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $stmt = $connection->prepare("DELETE FROM pedido WHERE codigo=:code");
    $stmt->bindParam('code', $code, PDO::PARAM_INT);
    $stmt->execute();
    header("location:pedido.php");
}

function update ($code){
    $connection = Conexao::getInstance();

    $data = formToArray();
    $sql = "UPDATE pizza SET sabor='{$data['flavor']}', valor={$data['value']}, descricao='{$data['description']}',
    imagem='{$data['image']}' WHERE codigo={$data['code']};";
    $connection->query($sql);

    header("location:pedidp.php");
}

function formToArray(){
    $code = isset($_POST['codee']) ? $_POST['codee'] : 0;
    $client = isset($_POST['client']) ? $_POST['client'] : '';
    $datetime = strtotime(isset($_POST['datetime']) ? $_POST['datetime'] : 0);
    $ordered = isset($_POST['ordered']) ? $_POST['ordered'] : 0;
    $pizzaFlvor = isset($_POST['pizza_flvor']) ? $_POST['pizza_flvor'] : '';
    $pizzaAmount = isset($_POST['pizza_amount']) ? $_POST['pizza_amount'] : 0;
    $snack = isset($_POST['snack']) ? $_POST['snack'] : '';
    $snackAmount = isset($_POST['amount']) ? $_POST['amount'] : 0;
    $drink = isset($_POST['drink']) ? $_POST['drink'] : '';
    $drinkAmount = isset($_POST['amount']) ? $_POST['amount'] : 0;

    $data = array(
        'code' => $code,
        'client'=> $client,
        'datetime' => date('Y-m-d h:i:s', $datetime), 
        'ordered' => $ordered,
        'pizza_flvor' => $pizzaFlvor,
        'pizza_amount' => $pizzaAmount,
        'snack' => $snack,
        'snack_amount' => $snackAmount,
        'drink' => $drink,
        'drink_amount' => $drinkAmount
    );

    return $data;
}

function findById($code){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT * FROM pedido WHERE codigo=$code;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function selectFrom($table, $collumnOne, $collumnTwo, $collumnThree){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT $collumnOne, $collumnTwo, $collumnThree FROM $table;");
    while($data = $query->fetch(PDO::FETCH_ASSOC)){
        echo "<option value='{$data[$collumnOne]}'>{$data[$collumnTwo]} - {$data[$collumnThree]}</option>";
    }
}

function tableJoinOrdered(){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT pedido.codigo, nome_cliente FROM pedido JOIN cliente ON 
    pedido.codigo_cliente = cliente.codigo;");
    while($data = $query->fetch(PDO::FETCH_ASSOC)){
        echo "<option value='{$data['codigo']}'>N° {$data['codigo']} - {$data['nome_cliente']}</option>";
    }
}