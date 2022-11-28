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
    $connection->query("INSERT INTO cidade (idestado, nome_cidade) VALUES('{$data['uf']}', '{$data['name']}');");
    header("location:cidade.php");
}

function remove(){
    $connection = Conexao::getInstance();
    
    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $stmt = $connection->prepare("DELETE FROM cidade WHERE idcidade=:code");
    $stmt->bindParam('code', $code, PDO::PARAM_INT);
    $stmt->execute();
    header("location:cidade.php");
}

function update (){
    $connection = Conexao::getInstance();

    $data = formToArray();
    $connection->query("UPDATE cidade SET idestado={$data['uf']}, nome_cidade='{$data['name']}' 
    WHERE idcidade={$data['code']};");
    header("location:cidade.php");
}

function formToArray(){
    $code = isset($_POST['code']) ? $_POST['code'] : 0;
    $uf = isset($_POST['uf']) ? $_POST['uf'] : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';

    $data = array(
        'code' => $code,
        'uf'   => $uf,
        'name' => $name
    );

    return $data;
}

function findById($code){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT idcidade, cidade.idestado, nome_cidade, nome_estado
    FROM cidade NATURAL JOIN estado WHERE idcidade=$code;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}