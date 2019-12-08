<?php 
require_once(__DIR__.'/../database/class-host.php');

session_start();
$handler = new Handler();

$name = $_POST['name'];
$address = $_POST['address'];


if ($handler->readByNameAddress($name, $address) != null ){
    header('location:add.php');
} else {
    $handler->create($name, $address);
    header('location:list.php');
}

?>
