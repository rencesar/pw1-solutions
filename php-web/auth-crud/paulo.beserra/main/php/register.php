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
$nick = addslashes($_POST["nick"]);
$passwd = hash('sha256', $_POST["passwd"]);
/* ----- POST ------ */

$response = array();
$resp = HandlerMySQL::listUsersByName($nick);

if ($resp) {
    $response["code"] = 401;
} else {
    $resp = HandlerMySQL::putUser($nick, $passwd);
    if ($resp) {
        $response["code"] = 200;
    } else {
        $response["code"] = 500;
    }
}


/* for effect button enviar */
sleep ( 3 );

/* header for call ajax js */
header("Content-Type: application/json; charset=utf-8");
echo json_encode($response);

?>