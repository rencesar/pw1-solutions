<?php
    require_once('../database/database.php');
    $conection = new Database();
    
    $conection->delete($_GET['id']);
    header('location:../listar.php');
?>