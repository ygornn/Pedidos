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

    $uf = strtoupper($_POST['UF'] ? $_POST['UF'] : '');
    $name = $_POST['name'] ? $_POST['name'] : '';
    $connection->query("INSERT INTO estado (uf, nome_estado) VALUES('$uf', '$name');");
    header("location:estado.php");
}

function remove(){
    $connection = Conexao::getInstance();
    
    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $connection->query("DELETE FROM estado WHERE idestado=$code");
    header("location:estado.php");
}

function update ($code){
    $connection = Conexao::getInstance();

    $uf = strtoupper($_POST['UF'] ? $_POST['UF'] : '');
    $name = $_POST['name'] ? $_POST['name'] : '';
    $connection->query("UPDATE estado SET uf='$uf', nome_estado='$name' WHERE idestado=$code;");
    header("location:estado.php");
}
function findById($code){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT * FROM estado WHERE idestado=$code;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}