
<?php
    $path = '../conf/Conexao.php';
    if(file_exists($path))
    include_once $path;
    $path = '../../conf/Conexao.php';
    if(file_exists($path))
    include_once $path;

    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT usuario, senha FROM cliente;");
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':  
            $action = isset($_GET['action']) ? $_GET['action'] : ""; 
            break;
        case 'POST': 
            $action = isset($_POST['action']) ? $_POST['action'] : ""; 
            break;
    }

    if($action == 'login'){

        $user = strtolower(isset($_POST['user']) ? $_POST['user'] : '');
        $password = sha1(isset($_POST['password']) ? $_POST['password'] : '');

        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
        
            if($user == $data['usuario'] and $password == $data['senha']){
                session_start();
                $_SESSION['usuario'] = $user;
                header("location:product.php");
            }
            else{
                header("location:index.php");
            }
        }
    }
    elseif ($action == 'logoff'){
        session_start();
        session_unset();
        header("location:index.php");

    }
    function verifySession (){
        session_start();
        if(!isset($_SESSION['usuario'])){
            $path = 'index.php';
            if(file_exists($path))
            header("location: $path");
            $path = '../index.php';
            if(file_exists($path))
            header("location: $path");
        }
    }

