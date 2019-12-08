<?php
require_once('config.php');

class CrudDatabase{

    public function __construct(){
        $dsn = DB.":dbname=".DBNAME.";host=".DBHOST;
        try {
          $this->connection = new PDO($dsn, DBUSER, DBPWD);
        } catch (PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage();
        }    }

    public function readAll(){
        $sql = "SELECT * FROM info";
        $pdoStm = $this->connection->query($sql);
        return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
    }

    public function create($name,$idade,$password){
        $sql = "INSERT INTO info (name,idade,password) VALUES ('${name}','${idade}','$password')";
       
        try {
            $this->connection->exec($sql);
            return $this->connection->lastInsertId();
        } catch(PDOExecption $e) { 
            $this->connection->rollback(); 
            print "Error!: " . $e->getMessage(); 
            return null;
        } 
    }

    public function update($name,$idade,$id){
        $sql = "UPDATE info
         SET name='${name}', idade ='${idade}' 
         WHERE id='${id}'";

        try {
        return $this->connection->exec($sql);
        } catch(PDOExecption $e) { 
          $this->connection->rollback(); 
        print "Error!: " . $e->getMessage(); 
        } 
    }

    public function delete($id){
        $sql = "DELETE FROM info WHERE id='${id}'";
        

        try {
          return $this->connection->exec($sql);
        } catch(PDOExecption $e) { 
          $this->connection->rollback(); 
          print "Error!: " . $e->getMessage(); 
        }
    }

    public function auth($name,$password){
      $sql = "SELECT * FROM info WHERE name='${name}' AND password='${password}'";
      $validation = $this->connection->query($sql);
      
      
      if($validation->rowCount() == 1){
        return True;
      }else{
        return False;
      }
  }

  public function readId($id){
    $sql = "SELECT * FROM info WHERE id='${id}'";
    $pdoStm = $this->connection->query($sql);

    return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
  }
}