<?php
    require_once('../database/database.php');
    $connection = new Database();

    $login = $_POST['nome'];
    $password = $_POST['senha'];
    if($connection->auth($login, $password)){
        session_start();
        $_SESSION['logado'] = true;
        header('location:../listar.php');
    }else{
        header('location:../index.php');
        
    }
?>