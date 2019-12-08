<?php
    require_once('crud.php');

    $banco = new Conexaocrud();
    $id = $_GET['id'];

     $banco->delete($id);
     header('location:home.php');

  ?>