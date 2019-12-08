<?php
require_once(__DIR__.'/../database/class-host.php');

session_start();
$handler = new Handler();

$handler->update($_POST['name'], $_POST['address'], $_POST['id']);
    
header('location:list.php');

?>
