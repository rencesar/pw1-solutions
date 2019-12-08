<?php
require_once 'config.php';

class Conexaocrud
{

    public function __construct()
    {
        $dsn = DB . ":dbname=" . DBNAME . ";host=" . DBHOST;
        try {
            $this->connection = new PDO($dsn, DBUSER, DBPWD);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }



    public function login()
    {

        if (!empty($_POST['username']) && !empty($_POST['password'])) {

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "select * from users WHERE username =  '" . $_POST['username'] . "'";
            // echo $sql;
            $query = $this->connection->prepare($sql);
            $query->execute(array());

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            if ($data) {
                $_SESSION['isUserLoggedIn'] = true;
                return false;

            }
            return true;
        }
    }
    public function read($id)
    {
        $sql = "SELECT * FROM songs WHERE id = '${id}'";
        $pdoStm = $this->connection->query($sql);
        return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        //echo 'session destroyed, user logged out';
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['isUserLoggedIn'])) {
            return $_SESSION['isUserLoggedIn'] ? true : false;
        }
    }
   public function check($n, $p)
    { 
        $sql = "select * from users WHERE username =  '" . $_POST['username'] . "'";
        echo $sql;
        //  $sql = "SELECT * FROM users WHERE username='${username}' AND password='${password}'";
        $retorno = $this->connection->exec($sql);
        $data = $retorno->fetchAll(PDO::FETCH_ASSOC);

        if ($data) {
            //      $hashedPassword = $data['password'];
            //    if (password_verify($_POST['password'], $hashedPassword)) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['isUserLoggedIn'] = true;
            return true;
            //   }
        }
        return false;
    }

    public function readAll()
    {
        $sql = "SELECT * FROM songs";
        $pdoStm = $this->connection->query($sql);
        return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
    }

    public function create($name, $music)
    {
        $sql = "INSERT INTO songs (name, music) VALUES ('${name}', '${music}');";

        try {
            $this->connection->exec($sql);
            return $this->connection->lastInsertId();
        } catch (PDOExecption $e) {
            $this->connection->rollback();
            print "Error!: " . $e->getMessage();
            return null;
        }
    }

    public function update($name, $music, $id)
    {

        $sql = "UPDATE songs SET name='${name}', music='${music}' WHERE id='${id}'";
       
        try {
            return $this->connection->exec($sql);
        } catch (PDOExecption $e) {
            $this->connection->rollback();
            print "Error!: " . $e->getMessage();
        }
    }
    public function delete($id)
    {
        $sql = "DELETE FROM songs WHERE id=${id}";
        
        try {
            return $this->connection->exec($sql);
        } catch (PDOExecption $e) {
            $this->connection->rollback();
            print "Error!: " . $e->getMessage();
        }

    }

}

//  $test = new conexaocrud();
//var_dump($test->readAll());