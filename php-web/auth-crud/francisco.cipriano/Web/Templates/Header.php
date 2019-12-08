<?php
include('./DB/DAOTrainer.php');
include('./DB/DAOPokeTrainer.php');
include('./DB/DAOImage.php');
include('./DB/DAOPokemon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../Web/Style/main.css">
    <title>Document</title>
</head>
<body>
<header>
    <?php    
    session_start();

    if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
        require_once('./Templates/Nav-index-login.php');
    } else {
        require_once('./Templates/Nav-index.php');
    }


    ?>
</header>