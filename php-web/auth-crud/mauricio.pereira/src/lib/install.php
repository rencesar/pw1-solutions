<?php

require_once("../database/database.php");

$script = file_get_contents("../database/schema.sql");

$banco = new Database();

$banco->install($script);

header("location:../index.html");

?>