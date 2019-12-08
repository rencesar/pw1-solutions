<?php

require_once('config.php');

class Database {
  private $connection;
  
  function __construct(){
    $host = DB.":dbname=".DBNAME.";host=".DBHOST;
    try {
      $this->connection = new PDO($host, DBUSER, DBPWD);
    } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
  }

  public function create($name, $address) {
  
    $sql = "INSERT INTO host (name, address) VALUES ('${name}', '${address}');";
    
    try {
      $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Fatal Error: " . $e->getMessage(); 
      return null;
    } 
  }

  public function update($name, $address, $id) {
  
    $sql = "UPDATE host
            SET name='${name}', address='${address}'
            WHERE id = ${id};";
  
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Error!: " . $e->getMessage(); 
    } 
  }

  public function delete($id) {
  
    $sql = "DELETE FROM host WHERE id = ${id};";
  
    try {
      return $this->connection->exec($sql);
    } catch(PDOExecption $e) { 
      $this->connection->rollback(); 
      print "Fatal Error: " . $e->getMessage(); 
    }
  }

  public function read($id) {
    $sql = "SELECT * FROM host WHERE id = ${id}";
    $resposta = $this->connection->query($sql);
    if($resposta){
      return $resposta->fetchAll(PDO::FETCH_ASSOC);
    }else{
      return null;
    }
  }

  #CRUD FUNCTIONS
  
   public function readByNameAddress($name, $address) {
    $sql = "SELECT * FROM host WHERE name='${name}' AND address='${address}'";
    $resposta = $this->connection->query($sql);
    if($resposta){
      return $resposta->fetchAll(PDO::FETCH_ASSOC);
    }else{
      return null;
    }
  }

   public function readAll() {
    $sql = "SELECT * FROM host";
    $resposta = $this->connection->query($sql);
    if($resposta){
      return $resposta->fetchAll(PDO::FETCH_ASSOC);
    }else{
      return null;
    }
  }
  
   public function readOrCreate($name, $address) {
    $result = readByNameAddress($name, $address);
    if ($result) {
      return $result;
    } else {
      return create($name, $address);
    }
  }
  
  public function readByUsername($name) {
    $sql = "SELECT password FROM users WHERE name = '${name}'";
    $resposta = $this->connection->query($sql);
    if($resposta){
      return $resposta->fetch(PDO::FETCH_ASSOC);
    }else{
      return null;
    }
  }
}