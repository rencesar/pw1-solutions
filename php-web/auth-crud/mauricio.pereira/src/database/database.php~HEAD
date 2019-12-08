<?php
require_once('config.php');

class Database {
  private $connection;

  function __construct(){
    $dsn = DB.":dbname=".DBNAME.";host=".DBHOST;
    try {
      $this->connection = new PDO($dsn, DBUSER, DBPWD);
    } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
  }

  public function create($name, $address) {
  
    $sql = "INSERT INTO host (name, address) VALUES ('${name}', '${address}');";
    
    try {
      $this->connection->exec($sql);
      return $this->connection->lastInsertId();
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
      return null;
    } 
  }

  public function update($name, $address, $id) {
  
    $sql = "UPDATE host
            SET name='${name}', address='${address}'
            WHERE id=${id};";
  
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    } 
  }

  public function delete($id) {
  
    $sql = "DELETE FROM host WHERE id=${id};";
  
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    }
  }

  /**
   *  Read by ID
   */
  public function read($id) {
    $sql = "SELECT * FROM host WHERE id = ${id}";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
  }

  /**
   * Read by Name and Address
   */
  public function readByNameAddress($name, $address) {
    $sql = "SELECT * FROM host WHERE name='${name}' AND address='${address}'";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
  }

  /**
   * Read All
   */
  public function readAll() {
    $sql = "SELECT * FROM host";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
  }

  /**
   * Read or Create
   */
  public function readOrCreate($name, $address) {
    $result = readByNameAddress($name, $address);

    if ($result) {
      return $result;
    } else {
      return create($name, $address);
    }
  }

  public function readByNameUser($name) {
    $sql = "SELECT password FROM users WHERE name='${name}'";
    $pdoStm = $this->connection->query($sql);
    return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
  }

}

