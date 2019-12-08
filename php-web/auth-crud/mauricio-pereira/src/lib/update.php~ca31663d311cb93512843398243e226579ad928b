<?php
    require_once('../database/database.php');
    session_start();
    if (!isset($_SESSION['logado'])){
        header('location:../index.html');
    }
    $banco = new Database();
    $banco->update($_POST['nome'], $_POST['endereco'], $_POST['id']);
    header('location:listar.php');