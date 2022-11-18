<?php
include_once "../../conf/Conexao.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'POST': $action = ($_POST['action']) ? $_POST['action'] : ''; break;
    case 'GET': $action = ($_GET['action']) ? $_GET['action'] : ''; break; 
}

if($action == 'delete')
excluir();
if($action == 'create')
create();

function create(){
    $pdo = Conexao::getInstance();

    $uf = strtoupper($_POST['UF'] ? $_POST['UF'] : '');
    $name = $_POST['name'] ? $_POST['name'] : '';
    $pdo->query("INSERT INTO estado (uf, nome_estado) VALUES('$uf', '$name');");
    header("location:estado.php");
}

function excluir(){
    $pdo = Conexao::getInstance();
    
    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $pdo->query("DELETE FROM estado WHERE idestado=$code");
    header("location:estado.php");
}