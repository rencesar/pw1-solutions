<?php

require_once('database.php');

$connection = connect();

class DAOPokemon {

  static function create($id, $name, $hp, $ataque, $defesa, $spAtaque, $spDefesa, $velocidade, $min, $max, $gray) {
      global $connection;
      $sql = "INSERT INTO Pokemon (id_pokemon, name, hp, ataque, defesa, spAtaque, spDefesa, velocidade, min_img, max_img, gray_img)
              VALUES ('${id}', '${name}', '${hp}', '${ataque}', '${defesa}', '${spAtaque}', '${spDefesa}', '${velocidade}', decode('{$min}','hex'), decode('{$max}','hex'), decode('{$gray}','hex'));";
      try {
        $connection->exec($sql);
        return $connection->lastInsertId();
      } catch(PDOExecption $e) { 
        $connection->rollback(); 
        print "Error!: " . $e->getMessage(); 
        return null;
      } 
  }

  static function read($id) {
    global $connection;
    $sql = "SELECT * FROM Pokemon WHERE id_pokemon = '${id}';";
    try {
      $pdoStm = $connection->query($sql);
      return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC)[0] : null;
    } catch(PDOExecption $e) { 
      $connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
      return null;
    } 
  }


}
?>

