<?php
require_once "../../conf/Conexao.php";

function buildSelect($table, $key, $value, $selection){
    $connection = Conexao::getInstance();
    $query = $connection->query("SELECT * FROM $table ORDER BY $value;");

    while($data = $query->fetch(PDO::FETCH_ASSOC)){
        if($data[$key] == $selection){
            echo "<option value='{$data[$key]}' selected>{$data[$value]}</option>";
        }else{
            echo "<option value='{$data[$key]}'>{$data[$value]}</option>";
        }
    }
}