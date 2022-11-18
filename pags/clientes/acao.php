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

    $name = $_POST['name'] ? $_POST['name'] : '';
    $cpf = $_POST['cpf'] ? $_POST['cpf'] : '';
    $date = strtotime($_POST['date'] ? $_POST['date'] : '');
    $email = $_POST['email'] ? $_POST['email'] : '';
    $telephone = $_POST['telephone'] ? $_POST['telephone'] : '';
    $password = password_hash($_POST['password'] ? $_POST['password'] : '', PASSWORD_BCRYPT);

    $pdo->query("INSERT INTO cliente (nome_cliente, cpf, data_nascimento, email, telefone, senha) VALUES('$name',
    '$cpf', '" . date("Y-m-d", $date) . "', '$email', '$telephone', '$password');");
    header("location: cliente.php");
}

function excluir(){
    $pdo = Conexao::getInstance();
    
    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $pdo->query("DELETE FROM cliente WHERE idcliente=$code");
    header("location:cliente.php");
}