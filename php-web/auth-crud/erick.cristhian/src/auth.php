<?php

require_once('database/database.php');

    $banco = new Database();
    $senha = $banco->readByUsername($_POST['login']);

    if ($_POST['senha'] == $senha['password']) {
        session_start();
        $_SESSION['logado'] = true;
        header('location:home.php');
    } else {
        header('location:index.html');
    }