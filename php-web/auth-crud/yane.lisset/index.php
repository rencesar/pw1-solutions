<?php
//session_start();
require 'crud.php';
$db = new Conexaocrud();
//$db->login();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body style="" margin-left: 6rem; margin-right: 5rem; margin-top: 5rem;>
    <div class="container">
        <div class="row" style="
    margin-right: 5rem;
">
        </div>

        <?php
require_once 'loginForm.php';
?>
        <div class="<?=$db->isLoggedIn() ? "isUserLoggedIn" : "loggedOut";?> ">
        </div>
        <?php
// session_start();
if ($db->isLoggedIn()) {
    header("Location: home.php");
     
}?>
    </div>
</body>

</html>