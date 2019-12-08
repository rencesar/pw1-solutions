<?php
    require_once('../database/database.php');
    session_start();
    $conection = new CrudDatabase();


    $login = $_POST['name'];
    $password = $_POST['password'];
    
    if($conection->auth($login,$password)){
        $_SESSION['auth'] = true;
        header('location:listar.php');
    }else{
        header('location:../index.php');
    }