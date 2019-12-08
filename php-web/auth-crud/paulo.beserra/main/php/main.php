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

/* set header */
header("Content-Type: application/json; charset=utf-8");

/* response */
$resp = array();

/*
* check if the user has passed 
* the login screen
*/
if (!isset($_SESSION["user"])) {
    $resp["error"] = "Você precisa fazer login".
        " para realizar essa operação";
	echo json_encode($resp);
    exit;
}

/*
* check if option
* is valid
*/
if (!isset($_POST["option"])) {
    $resp["error"] = "Você precisa fazer login".
        " para realizar essa operação";
	echo json_encode($resp);
    exit;
}

/* include files */
require_once('./class/handler-mysql.php');

/* ------------------------------------------
 * validation to prevent injection attacks
 * ------------------------------------------ */
/* ----- POST ------ */
$option = $_POST["option"];

if (isset($_POST["nota"]))
    $nota = $_POST["nota"];
if (isset($_POST["cod_nota"]))
    $cod_nota = $_POST["cod_nota"];
    

$user = $_SESSION["user"];


switch ($option) {
    case 'insert-nota':
        if (HandlerMySQL::putAnnotation($user["user_id"], $nota)) {
            $resp["response"] = "Mensagem adicionada com sucesso";
            $resp["code"] = 200;
        } else {
            $resp["response"] = "Não foi possível adicionar mensagem";
            $resp["code"] = 500;
        }
        break;
    case 'get-notas':
        if ($data = HandlerMySQL::listAnnotations()) {
            $resp["response"] = $data;
        }
        break;
    case 'del-nota':
        if (HandlerMySQL::delAnnotation($cod_nota)) {
            $resp["response"] = "success";
            $resp["code"] = 200;
        } else {
            $resp["response"] = "Não foi possível deletar mensagem";
            $resp["code"] = 500;
        }
        break;
    case 'edit-nota':
        
        if (HandlerMySQL::updateAnnotation($nota, $cod_nota)) {
            $resp["response"] = 200;
        } else {
            $resp["response"] = 500;
        }
        break;
        
    
}

/* for effect button enviar */
sleep ( 1 );
echo json_encode($resp);

?>