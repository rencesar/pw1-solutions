<?php
require_once("utils/config.php");
require_once("models/products.php");

session_start();
if (!$_SESSION['auth']){
   session_write_close();
   header('location: index.php');
}


$id = $_GET['id'] ?? null;
ProductModel::delete($id);
header('location: ../list.php');

?>