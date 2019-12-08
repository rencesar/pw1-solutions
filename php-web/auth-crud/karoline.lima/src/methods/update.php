<?php

    require_once('../database/database.php');

    session_start();
    $connection  = new CrudDatabase();

    $name = $_POST['name'];
    $idade = $_POST['idade'];
    $id = $_POST['id'];

    $connection->update($name,$idade,$id );

    header('location:listar.php');
?>