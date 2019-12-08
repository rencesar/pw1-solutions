<?php
require_once('config.php');

class Banco{
	private $connection;

	function __construct(){
	  $dsn = DB.":dbname=".DBNAME.";host=".DBHOST;
	  try {
	    $this->connection = new PDO($dsn, DBUSER, DBPWD);
	  } catch (PDOException $e) {
	    echo 'Connection failed: ' . $e->getMessage();
	  }
	}

	public function create($email, $senha) {

	  $sql = "INSERT INTO aluno (email, senha) VALUES ('${email}', '${senha}');";
	  
	  try {
	    $this->connection->exec($sql);
	    return $this->connection->lastInsertId();
	  } catch(PDOExecption $e) { 
	    $connection->rollback(); 
	    print "Error!: " . $e->getMessage(); 
	    return null;
	  }
	 } 

	public function read($email, $senha) {

	    $sql = "SELECT * FROM aluno WHERE email = ${email} AND senha = ${senha}";

	    $pdoStm = $this->connection->query($sql);
	    return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;

	  	try {
	    	$pdoStm = $this->connection->exec($sql);
	        return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
	  	} catch(PDOExecption $e) { 
	  	$connection->rollback(); 
	  	print "Error!: " . $e->getMessage(); 
	  	return null;
	  	}

	 }

	public function update($email, $senha, $id) {

	  $sql = "UPDATE aluno
	          SET email='${email}', senha='${senha}'
	          WHERE id=${id}";

	  try {
	    return $this->connection->exec($sql);
	  } catch(PDOExecption $e) { 
	    $connection->rollback(); 
	    print "Error!: " . $e->getMessage(); 
	  }
	} 

	public function delete($email) {

	  $sql = "DELETE FROM aluno WHERE email=${email}";

	  try {
	    return $this->connection->exec($sql);
	  } catch(PDOExecption $e) { 
	    $connection->rollback(); 
	    print "Error!: " . $e->getMessage(); 
	  }
	}
}