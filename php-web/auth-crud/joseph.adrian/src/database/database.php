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
    
    
    public function create($nome, $pelagem) {
    
        $sql = "INSERT INTO gato (nome, pelagem) VALUES ('${nome}', '${pelagem}');";
        
        try {
        $this->connection->exec($sql);
        return $this->connection->lastInsertId();
        } catch(PDOExecption $e) { 
        $this->connection->rollback(); 
        print "Error!: " . $e->getMessage(); 
        return null;
        } 
    }
    public function update($nome, $pelagem, $id) {
    
        $sql = "UPDATE gato
                SET nome='${nome}', pelagem='${pelagem}'
                WHERE id=${id};";
    
        try {
        return $this->connection->exec($sql);
        } catch(PDOExecption $e) { 
        $this->connection->rollback(); 
        print "Error!: " . $e->getMessage(); 
        } 
    }
    public function delete($id) {
    
        $sql = "DELETE FROM gato WHERE id=${id};";
    
        try {
        return $this->connection->exec($sql);
        } catch(PDOExecption $e) { 
        $this->connection->rollback(); 
        print "Error!: " . $e->getMessage(); 
        }
    }
  
    public function read($id) {
        $sql = "SELECT * FROM gato WHERE id = ${id}";
        $pdoStm = $this->connection->query($sql);
        return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
    }
  
    public function readByNameOrPelagem($nome, $pelagem) {
        $sql = "SELECT * FROM gato WHERE nome='${nome}' OR pelagem='${pelagem}'";
        $pdoStm = $this->connection->query($sql);
        return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
    }
 
    public function readAll() {
        $sql = "SELECT * FROM gato";
        $pdoStm = $this->connection->query($sql);
        return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
    }

    public function auth($nome, $senha){
        $sql = "SELECT * FROM usuarios WHERE nome='{$nome}' AND senha='${senha}'";
        $pdoStm = $this->connection->query($sql);

        return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;

    }
  

}