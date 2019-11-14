<?php 
require_once('utils/database.php');
require_once('models/users.php');

function hash_password($username, $password) {
    return hash('sha256', SECRET_KEY.$password.$username);
}

$logged_user = null;
if ($_SESSION['auth']){
    $logged_user = UserModel::get_user_by_username($_SESSION['user']);
}
?>