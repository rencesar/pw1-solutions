<?php
    require_once('../database/database.php');
    session_start();
    if (!isset($_SESSION['logado'])){
        header('location:../index.html');
    }
    $banco = new Database();
    $banco->delete($_GET['id']);
    header('location:listar.php');