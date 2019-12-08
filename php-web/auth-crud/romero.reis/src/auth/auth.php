<?php
    require_once('../database/database.php');
    $banco = new Database();
    $senha = $banco->readByNameUser($_POST['login']);

    if ($_POST['senha'] == $senha['password']) {
        session_start();
        $_SESSION['logado'] = true;
        header('location:../lib/listar.php');
    } else {
        header('location:../index.html');
    }
?>