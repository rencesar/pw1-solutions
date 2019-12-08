<?php
require_once(__DIR__.'/../database/class-host.php');

session_start();
$handler = new Handler();

$handler->delete($_GET['id']);

header('location:list.php');

?>