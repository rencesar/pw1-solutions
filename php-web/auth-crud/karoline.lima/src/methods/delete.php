<?php
    require_once('../database/database.php');
    $conection = new CrudDatabase();
    
    $conection->delete($_GET['id']);
    header('location:listar.php');
?>