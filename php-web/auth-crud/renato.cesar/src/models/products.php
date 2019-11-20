<?php
require_once('utils/database.php');

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

    private function setId($id) {
      $this->id = $id;
    }

    public function save() {
        if ($this->id) {
          global $dbconnection;
          $qtd = $this->qtd;
          $name = $this->name;
          $price = $this->price;
          $sql = "UPDATE product
                    SET name='${name}',
                    SET qtd='${qtd}',
                    SET price='${price}',
                    WHERE id=${id};";
          try {
            return $dbconnection->exec($sql);
          } catch(PDOExecption $e) { 
            $dbconnection->rollback(); 
            print "Error!: " . $e->getMessage(); 
          } 
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

    public static function update($id, $name, $qtd, $price) {
      global $dbconnection;
      $sql = "UPDATE product
              SET ${field}='${qtd}',
              WHERE id=${id};";
    
      try {
        return $dbconnection->exec($sql);
      } catch(PDOExecption $e) { 
        $dbconnection->rollback(); 
        print "Error!: " . $e->getMessage(); 
      } 
    }
    public static function delete($id) {
      global $dbconnection;
      $sql = "DELETE FROM product WHERE id=${id};";
    
      try {
        return $dbconnection->exec($sql);
      } catch(PDOExecption $e) { 
        $dbconnection->rollback(); 
        print "Error!: " . $e->getMessage(); 
      }
    }

    public function readAll() {
      global $dbconnection;
      $sql = "SELECT * FROM product";
      $pdoStm = $dbconnection->query($sql);
      return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
    }

    public static function getById($id) {
      global $dbconnection;
      $sql = "SELECT * FROM product WHERE id='${id}';";
    
      try {
        foreach ($dbconnection->query($sql) as $row) {
          $product = new ProductModel($row['name'], $row['qtd'], $row['price']);
          $product->setId($row['id']);
          return $product;
        }
      } catch(PDOExecption $e) { 
        $dbconnection->rollback(); 
        print "Error!: " . $e->getMessage(); 
      }
    }
  }
?>