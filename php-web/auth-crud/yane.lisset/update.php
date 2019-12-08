<?php
    require_once('crud.php');
   
    session_start();
    
    $banco = new Conexaocrud();
    $name = $_POST['name'];
    $music = $_POST['music'];
        
    $id = $_POST['id'];
    $banco->update($name,$music,$id);
    header('location:home.php');
 

    
     
?>