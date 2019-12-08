<?php

require_once('./DB/DAOTrainer.php');
require_once('./DB/DAOPokeTrainer.php');

/* Delete trainer-card at index  */
if (!empty($_POST['email-delete'])) {
    DAOTrainer::delete($_POST['email-delete']);
} elseif (!empty($_POST['login'])) { 
    /* 
    Login logic 
    */
    session_start();
    $login = $_POST['login'];
    $hash = DAOTrainer::read($login)['password'];
    $auth = password_verify($_POST['password'], $hash);
    
    if ($auth == True) {
        $_SESSION['login'] = $login;
    } else {
        unset ($_SESSION['login']);  
    }
} elseif (!empty($_POST['name-create']) && !empty($_POST['gender-create']) && !empty($_POST['email-create'])) {
    /* 
    Signup logic 
    */
    $n = $_POST['name-create'];
    $g = $_POST['gender-create'];
    $e = $_POST['email-create'];
    $p = password_hash($_POST['password-create'], PASSWORD_DEFAULT);
    $id = DAOTrainer::create($n, $g, $e, $p);

    echo $_POST['poke-card-ids'];

    if (!empty($_POST['poke-card-ids'])) {
        $poke_ids = explode(",", $_POST['poke-card-ids']);

        foreach($poke_ids as $pokeid) {
            DAOPokeTrainer::create($id, $pokeid);
        }
    }
} elseif  (!empty($_POST['name-update']) && !empty($_POST['gender-update']) && !empty($_POST['email-update'])) {
    /* 
    Update logic 
    */
    $n = $_POST['name-update'];
    $g = $_POST['gender-update'];
    $e = $_POST['email-update'];
    DAOTrainer::update($n, $g, $e);
} 

header("Location: index.php");  

?>