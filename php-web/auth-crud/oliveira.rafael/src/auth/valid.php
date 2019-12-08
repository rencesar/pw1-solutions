<?php 
require_once(__DIR__.'/../database/class-host.php');

session_start();
$handler = new Handler();

$login = $_POST['login'];
$hash = hash('sha256', $_POST['password']);

if ($handler->validate($login, $hash)) {
    $_SESSION['logged'] = true;
    header('location:../system/list.php');
} else {
    header('location:../system/index.php');
};