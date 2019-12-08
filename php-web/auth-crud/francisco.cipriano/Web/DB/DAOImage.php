<?php

require_once('database.php');

$connection = connect();

class DAOImage {

    static function get_min_img($val) {
        global $connection;
        $sql = "SELECT encode(min_img, 'base64') FROM Pokemon where id_pokemon='$val'";
        $pdoStm = $connection->query($sql);
        $pdoStm ? $data = $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
        $img = $data[0]['encode'];
        $dat= "data:image/*;base64," . $img;
        return $dat;
    }

    static function get_max_img($val) {
        global $connection;
        $sql = "SELECT encode(max_img, 'base64') FROM Pokemon where id_pokemon='$val'";
        $pdoStm = $connection->query($sql);
        $pdoStm ? $data = $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
        $img = $data[0]['encode'];
        $dat= "data:image/*;base64," . $img;
        return $dat;
    }


}

?>