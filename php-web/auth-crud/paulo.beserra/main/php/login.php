<?php

/*
* GNU GENERAL PUBLIC LICENSE
* Version 3, 29 June 2007
*
* Copyright (C) 2007 Free Software Foundation, Inc. <https://fsf.org/>
* Everyone is permitted to copy and distribute verbatim copies
* of this license document, but changing it is not allowed.
* https://www.gnu.org/licenses/gpl-3.0.txt
*/

/*
* By Paulo Roberto Júnior
*/

/* Required for loggin session */
session_start();

require_once('./class/handler-mysql.php');

/* ------------------------------------------
 * validation to prevent injection attacks
 * ------------------------------------------ */
/* ----- POST ------ */
$user = addslashes($_POST["login"]);
$passwd = addslashes($_POST["senha"]);
/* ----- POST ------ */

$response = array();

$resp = HandlerMySQL::listUsersByName($user);
if ($resp) {
    $response["nick"] = $resp["nick"];
    $_SESSION["user"]["user_id"] = $resp["cod"];
    $_SESSION["user"]["mail"] = $resp["mail"];
    $_SESSION["user"]["nick"] = $resp["nick"];
    $_SESSION["user"]["img"] = $resp["img"];
    $_SESSION["user"]["data_create"] = $resp["data_create"];
} else {
    $response["mesg_error"] = "usuário não existe";
    $response["cod"] = 500;
}

/* for effect button enviar */
sleep ( 3 );

/* header for call ajax js */
header("Content-Type: application/json; charset=utf-8");
echo json_encode($response);

?>