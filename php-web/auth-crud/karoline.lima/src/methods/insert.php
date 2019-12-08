<?php

    require_once('../database/database.php');
    $conection = new CrudDatabase();
    $nome = $_POST['name'] ;
    $idade = $_POST['idade'] ;
    $password = $_POST['password'];
    

    $add = $conection->create($nome,$idade,$password);
    header('location:../index.php');