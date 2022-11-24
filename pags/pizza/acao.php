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

    $sql = "INSERT INTO pizza (sabor, valor, descricao, imagem) VALUES('{$data['flavor']}',
    {$data['value']}, '{$data['description']}', '{$data['image']}');";
    $connection->query($sql);

    images();
    header("location:pizza.php");
}

function remove(){
    $connection = Conexao::getInstance();
    
    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $stmt = $connection->prepare("DELETE FROM pizza WHERE codigo=:code");
    $stmt->bindParam('code', $code, PDO::PARAM_INT);
    $stmt->execute();
    header("location:pizza.php");
}

function update ($code){
    $connection = Conexao::getInstance();

    $data = formToArray();
    $sql = "UPDATE pizza SET sabor='{$data['flavor']}', valor={$data['value']}, descricao='{$data['description']}',
    imagem='{$data['image']}' WHERE codigo={$data['code']};";
    $connection->query($sql);

    images();
    header("location:pizza.php");
}

function formToArray(){
    $code = isset($_POST['code']) ? $_POST['code'] : 0;
    $flavor = isset($_POST['flavor']) ? $_POST['flavor'] : '';
    $value = isset($_POST['value']) ? $_POST['value'] : 0;
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $image = $_FILES['pic']['name'];

    $data = array(
        'code' => $code,
        'flavor' => $flavor,
        'value' => $value,
        'description' => $description,
        'image' => $image
    );

    return $data;
}

function findById($code){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT * FROM pizza WHERE codigo=$code;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function images (){
    $to = basename($_FILES['pic']['name']);
    $path = '../../assets/img/' . $to;
    $from = $_FILES['pic']['tmp_name'];

    move_uploaded_file($from, $path);
}