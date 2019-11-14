<?php
require_once('utils/database.php');
require_once('utils/auth.php');

class ProductModel {
    private $id;
    public $name;
    public $qtd;
    public $price;

    function __construct($name, $qtd, $price){
        $this->name = $name;
        $this->qtd = $qtd;
        $this->price = $price;
    }

    public function save() {
        if ($this->id) {
            return ProductModel::update($this->id, $this->username, $this->password);
        }
        return ProductModel::create($this->name, $this->qtd, $this->price);
    }

    public static function create($name, $qtd, $price) {
      global $dbconnection;
      $sql = "INSERT INTO product (name, qtd, price) VALUES ('${name}', ${qtd}, '${price}');";
      
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