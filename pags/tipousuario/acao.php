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
    $connection->query("INSERT INTO tipousuario (descricao) VALUES('{$data['description']}');");
    header("location:tipousuario.php");
}

function remove(){
    $connection = Conexao::getInstance();
    
    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $stmt = $connection->prepare("DELETE FROM tipousuario WHERE codigo=:code");
    $stmt->bindParam('code', $code, PDO::PARAM_INT);
    $stmt->execute();
    header("location:tipousuario.php");
}

function update (){
    $connection = Conexao::getInstance();

    $data = formToArray();
    $connection->query("UPDATE tipousuario SET descricao='{$data['description']}' 
    WHERE codigo={$data['code']};");
    header("location:tipousuario.php");
}

function formToArray(){
    $code = isset($_POST['code']) ? $_POST['code'] : 0;
    $description = isset($_POST['description']) ? $_POST['description'] : 0;

    $data = array(
        'code' => $code,
        'description'   => $description
    );

    return $data;
}

function findById($code){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT * FROM tipousuario WHERE codigo=$code;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}