<?php

require_once('database.php');

$connection = connect();

class DAOTrainer {
  
  static function create($name, $gen, $email, $password) {
    global $connection;
    $sql = "INSERT INTO Trainer (name, gender, email, password) VALUES ('${name}', '${gen}', '${email}', '${password}');";
    try {
      $connection->exec($sql);
      return $connection->lastInsertId();
    } catch(PDOExecption $e) { 
      $connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
      return null;
    } 
  }

  static function read($email) {
    global $connection;
    $sql = "SELECT * FROM Trainer WHERE email = '${email}';";
    try {
      $pdoStm = $connection->query($sql);
      return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
    } catch(PDOExecption $e) { 
      $connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
      return null;
    } 
  }

  static function delete($email) {
    global $connection;
    $sql = "DELETE FROM Trainer where email = '${email}' ;";
    try {
      $connection->exec($sql);
      return $connection->lastInsertId();
    } catch(PDOExecption $e) { 
      $connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
      return null;
    } 
  }

  static function update($name, $gen, $email) {
    global $connection;
    $sql = "UPDATE Trainer SET name = '${name}', gender = '${gen}', email = '${email}' WHERE email = '${email}';";
    try {
      $pdoStm = $connection->query($sql);
      return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
    } catch(PDOExecption $e) { 
      $connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
      return null;
    } 
  }


  static function login($email, $password) {
    global $connection;
    $sql = "SELECT * FROM Trainer  WHERE name = '${email}' AND password = '${password}';";
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
    $sql = "SELECT * FROM Trainer";
    $pdoStm = $connection->query($sql);
    return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
  }

  static function readLastRegistered() {
    global $connection;
    $sql = "SELECT * FROM Trainer order by idTreinador desc";
    $pdoStm = $connection->query($sql);
    return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
    
  }
  
}

?>