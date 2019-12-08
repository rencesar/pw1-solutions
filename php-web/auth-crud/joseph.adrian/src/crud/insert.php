<?php
    require_once('../database/database.php');
    $conection = new Database();
    $nome = $_POST['nome'] ;
    $pelagem = $_POST['pelagem'] ;
    
    
    $add = $conection->create($nome, $pelagem);
    header('location:../listar.php');