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
    $data = formToArray();
    $sql = "INSERT INTO cliente (nome_cliente, usuario, cpf, data_nascimento, email, telefone, senha) 
            VALUES('{$data['name']}', '{$data['user']}', '{$data['cpf']}', '" . date("Y-m-d", $data['date']) . "', '{$data['email']}',
            '{$data['telephone']}', '{$data['password']}');";
    $pdo->query($sql);
    header("location: cliente.php");
}

function remove(){
    $connection = Conexao::getInstance();
    
    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $stmt = $connection->prepare("DELETE FROM cliente WHERE idestado=:code");
    $stmt->bindParam('code', $code, PDO::PARAM_INT);
    $stmt->execute();
    header("location:estado.php");
}

function formToArray(){
    $code = isset($_POST['code']) ? $_POST['code'] : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $date = strtotime(isset($_POST['date']) ? $_POST['date'] : '');
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
    $password = sha1(isset($_POST['password']) ? $_POST['password'] : '');

    $data = array(
        'code' => $code,
        'name' => $name,
        'user' => $user,
        'cpf'  => $cpf,
        'date' => $date,
        'email'=> $email,
        'telephone'=> $telephone,
        'password' => $password
    );

    return $data;
}