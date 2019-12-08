<?php
    require_once('../database/database.php');

    

    $banco = new Database();
    $banco->update($_POST['nome'], $_POST['pelagem'], $_POST['id']);

    header('location:../listar.php');

    ?>