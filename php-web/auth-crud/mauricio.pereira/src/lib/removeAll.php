<?php
    require_once('../database/database.php');
    session_start();
    if (!isset($_SESSION['logado'])){
        header('location:../index.html');
    }
    $hosts = array($_POST['']);
    
    $banco = new Database();

    $banco->delete($_POST['']);
    header('location:listar.php');