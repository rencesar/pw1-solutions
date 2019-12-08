<?
require_once('database.php');

$banco = new Banco();

if (isset($banco->read($_POST['form-login-email'], $_POST['form-login-senha']))){
 echo "Olá";
} else {
    echo "Houve um erro! Tente novamente!";
}

?>