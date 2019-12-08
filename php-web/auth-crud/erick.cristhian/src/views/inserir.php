<?php
    require_once('../database/database.php');

    session_start();
    if (!isset($_SESSION['logado'])){
        header('location:../index.html');
    }
    
    $banco = new Database();
    $read = $banco->create($_POST['nome'],$_POST['endereco']);
    header('location:listar.php');