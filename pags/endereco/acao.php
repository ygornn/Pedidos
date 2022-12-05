<?php
include_once "../../conf/Conexao.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'GET': $action = isset($_GET['action']) ? $_GET['action'] : ""; break;
    case 'POST': $action = isset($_POST['action']) ? $_POST['action'] : ""; break;
};

switch($action){
    case 'remove': remove(); break;
    case 'save': {
        $code = formToArray();
        if($code['code'] == 0)
        create();
        else {
            update();
        }
    }
}

function create(){
    $connection = Conexao::getInstance();

    $data = formToArray();
    $connection->query("INSERT INTO endereco (idcidade, nome_endereco) VALUES({$data['city']}, '{$data['address']}');");
    $addressData = addressData();
    updateClient($addressData['idendereco']);

    sessionVerify();
}

function remove(){
    $connection = Conexao::getInstance();
    
    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $stmt = $connection->prepare("DELETE FROM endereco WHERE idendereco=:code");
    $stmt->bindParam('code', $code, PDO::PARAM_INT);
    $stmt->execute();
    header("location:endereco.php");
}

function update (){
    $connection = Conexao::getInstance();

    $data = formToArray();
    $connection->query("UPDATE endereco SET idcidade={$data['city']}, nome_endereco='{$data['address']}' 
    WHERE idendereco={$data['code']};");
    header("location:endereco.php");
}

function formToArray(){
    $code = isset($_POST['code']) ? $_POST['code'] : 0;
    $city = isset($_POST['city']) ? $_POST['city'] : 0;
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    $data = array(
        'code' => $code,
        'city' => $city,
        'address'=> $address
    );

    return $data;
}

function addressData(){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT * FROM endereco ORDER BY idendereco DESC LIMIT 1;");
    $addressData = $query->fetch(PDO::FETCH_ASSOC);
    return $addressData;
}

function updateClient($id){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT * FROM cliente ORDER BY codigo DESC LIMIT 1;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    $sql = "UPDATE cliente SET idendereco={$id} WHERE codigo={$data['codigo']};";
    $connection->exec($sql);
}

function findById($code){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT idendereco, nome_endereco, cidade.idcidade, nome_cidade FROM
    endereco NATURAL JOIN cidade WHERE idendereco=$code;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function sessionVerify (){
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('location:../index.php');
    }
    else{
        header('location:product.php');
    }
}