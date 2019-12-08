<?php
require_once(__DIR__.'/../database/class-host.php');

$sql = file_get_contents(__DIR__.'/../database/schema.sql');

$handler = new Handler();

$handler->loadDatabase($sql);

header('location:index.php');

?>
