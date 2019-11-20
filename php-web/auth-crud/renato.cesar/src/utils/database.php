<?php

function start_database_connection(){
    try {
        return new PDO("mysql:dbname=".getenv('MYSQL_DATABASE').";host=mysql", getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

$dbconnection = start_database_connection();

?>
