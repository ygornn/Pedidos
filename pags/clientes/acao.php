<?php
include_once "../../conf/Conexao.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'GET': $action = isset($_GET['action']) ? $_GET['action'] : ''; break;
    case 'POST': $action = isset($_POST['action']) ? $_POST['action'] : ''; break; 
}

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
    $pdo = Conexao::getInstance();
    $data = formToArray();
    $sql = "INSERT INTO cliente (nome_cliente, usuario, data_nascimento, email, senha, codigo_tipousuario) 
            VALUES('{$data['name']}', '{$data['user']}', '" . date("Y-m-d", $data['date']) . "', '{$data['email']}',
             '{$data['password']}', {$data['usertype']});";
    $pdo->query($sql);
    header("location: ../endereco/cadastro.php");
}

function update (){
    $connection = Conexao::getInstance();

    $data = formToArray();
    $connection->query("UPDATE cliente SET nome_cliente='{$data['name']}', usuario='{$data['user']}',
    data_nascimento='" . date('Y-m-d', $data['date']) . "', email='{$data['email']}', codigo_tipousuario={$data['usertype']},
    idendereco={$data['address']} 
    WHERE codigo={$data['code']};");
    header("location:cliente.php");
}

function remove(){
    $connection = Conexao::getInstance();
    
    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $stmt = $connection->prepare("DELETE FROM cliente WHERE codigo=:code");
    $stmt->bindParam('code', $code, PDO::PARAM_INT);
    $stmt->execute();
    header("location:cliente.php");
}

function formToArray(){
    $code = isset($_POST['code']) ? $_POST['code'] : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $user = strtolower(isset($_POST['user']) ? $_POST['user'] : '');
    $date = strtotime(isset($_POST['date']) ? $_POST['date'] : '');
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = sha1(isset($_POST['password']) ? $_POST['password'] : '');
    $userType = isset($_POST['usertype']) ? $_POST['usertype'] : 0;
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    $data = array(
        'code' => $code,
        'name' => $name,
        'user' => $user,
        'date' => $date,
        'email'=> $email,
        'password' => $password,
        'usertype' => $userType,
        'address'  => $address
    );

    return $data;
}

function findById($code){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT cliente.codigo, nome_cliente, usuario, data_nascimento, email, cliente.codigo_tipousuario,
    descricao, cliente.idendereco, nome_endereco FROM cliente JOIN tipousuario ON cliente.codigo_tipousuario = tipousuario.codigo
    JOIN endereco ON cliente.idendereco = endereco.idendereco WHERE cliente.codigo=$code;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}