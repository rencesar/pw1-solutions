<?php

require_once('database.php');

$connection = connect();

class DAOPokeTrainer {
  
  static function create($id, $pokeid) {
    global $connection;
    $sql = "INSERT INTO Pokemon_Trainer (id_trainer, id_pokemon) VALUES ('${id}', '${pokeid}');";
    echo $sql;
    try {
      $connection->exec($sql);
      return $connection->lastInsertId();
    } catch(PDOExecption $e) { 
      $connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
      return null;
    } 
  }

  static function read($id_trainer) {
    global $connection;
    $sql = "SELECT * FROM Pokemon_Trainer WHERE id_trainer = '${id_trainer}';";
    try {
      $pdoStm = $connection->query($sql);
      return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
    } catch(PDOExecption $e) { 
      $connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
      return null;
    } 
  }

  // Queries

  static function readAll() {
    global $connection;
    $sql = "SELECT * FROM PokeTrainer";
    $pdoStm = $connection->query($sql);
    return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
  }

}

?>