<?php
require_once('utils/database.php');
require_once('utils/auth.php');

class UserModel {
    private $id;
    public $username;
    public $password;

    function __construct($username, $password){
        $this->username = $username;
        $this->password = $password; 
    }

    public function save() {
        if ($this->id) {
            return UserModel::update($this->id, $this->username, $this->password);
        }
        return UserModel::create($this->username, $this->password);
    }

    public static function create($username, $password) {
      global $dbconnection;
      $password =  hash_password($username, $password);
      $sql = "INSERT INTO user (username, password) VALUES ('${username}', '${password}');";
      
      try {
        return $dbconnection->exec($sql);
      } catch(PDOExecption $e) { 
        $dbconnection->rollback();
        print "Error!: " . $e->getMessage();
        return null;
      } 
    }

    public static function update($id, $username, $password) {
      global $dbconnection;    
      $sql = "UPDATE host
              SET username='${username}',
              WHERE id=${id};";
    
      try {
        return $dbconnection->exec($sql);
      } catch(PDOExecption $e) { 
        $dbconnection->rollback(); 
        print "Error!: " . $e->getMessage(); 
      } 
    }
    public static function delete($id) {
    
      $sql = "DELETE FROM user WHERE id=${id};";
    
      try {
        return $dbconnection->exec($sql);
      } catch(PDOExecption $e) { 
        $dbconnection->rollback(); 
        print "Error!: " . $e->getMessage(); 
      }
    }

    public static function get_user_by_username($username) {
      global $dbconnection;
      $sql = "SELECT * FROM user WHERE username='${username}';";
    
      try {
        foreach ($dbconnection->query($sql) as $row) {
          return new UserModel($row['username'], $row['password']);
        }
      } catch(PDOExecption $e) { 
        $dbconnection->rollback(); 
        print "Error!: " . $e->getMessage(); 
      }
    }

    public function compare_passwords($password) {
      return $this->password == hash_password($this->username, $password);
    }
  }
?>