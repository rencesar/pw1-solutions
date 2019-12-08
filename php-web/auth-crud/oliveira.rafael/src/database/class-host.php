<?php
require_once('config.php');

class Handler{

    public function __construct(){
    
        $dsn = DB.":dbname=".DBNAME.";host=".DBHOST;
        try {
            $this->connection = new PDO($dsn, DBUSER, DBPWD);
        } catch (PDOException $e) {
            echo 'this->Connection failed: ' . $e->getMessage();
        }
    
    }

    public function loadDatabase($sql){
        try {
            $this->connection->exec($sql);
            return $this->connection->lastInsertId();
        } catch(PDOExecption $e) { 
            $this->connection->rollback(); 
            print "Error!: " . $e->getMessage(); 
            return null;
        }
    }

    public function validate($login, $password){
        $sql = "SELECT * FROM users WHERE username = '${login}' and password = '${password}' ";
        $result = $this->connection->query($sql);

        if ( $result->rowCount() == 1 ) {
            return True;
        } else {
            return False;
        }
    }

    public function create($name, $address) {

        $sql = "INSERT INTO host (name, address) VALUES ('${name}', '${address}')" ;
        
        try {
            $this->connection->exec($sql);
            return $this->connection->lastInsertId();
        } catch(PDOExecption $e) { 
            $this->connection->rollback(); 
            print "Error!: " . $e->getMessage(); 
            return null;
        }   

    }

    /**
    * Read by ID
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
        $result = $this->readByNameAddress($name, $address);
    
        if ($result) {
        return $result;
        } else {
        $this->create($name, $address);
        return True;
        }
    }

    function delete($id) {
        $sql = "DELETE FROM host WHERE id=${id}";
        try {
          return $this->connection->exec($sql);
        } catch(PDOExecption $e) { 
          $this->connection->rollback(); 
          print "Error!: " . $e->getMessage(); 
        }   
    }

    
    function update($name, $address, $id) {
      
        $sql = "UPDATE host
                SET name='${name}', address='${address}'
                WHERE id=${id}";
      
        try {
          return $this->connection->exec($sql);
        } catch(PDOExecption $e) { 
          $this->connection->rollback(); 
          print "Error!: " . $e->getMessage(); 
        } 
    }


}




?>