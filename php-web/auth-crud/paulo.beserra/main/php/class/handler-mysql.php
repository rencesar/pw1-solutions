<?php

class HandlerMySQL {
    
    function __constructor() {}
    
    public static function conMySQL() {
        return new mysqli("localhost", "painel_user",
            "painel_pass", "painel_db");
    }
    
    public static function execSelect($query) {
        try {
          $con = self::conMySQL();
          $lResult = $con->query($query);
          return $lResult ? $lResult->fetch_assoc() : null;
        }
        catch (Exception $e) {
          throw(new Exception(" + Error: ".$e));
        } 
    }

    public static function updateAnnotation($nota, $id) {
        $con = self::conMySQL();
        $query = "update annotations set mesg = '$nota' where cod=$id";
        if ($con->query($query) === TRUE)
            return true;
        return false;
    }

    
    public static function putAnnotation($id_user, $mesg) {
        $con = self::conMySQL();
        $query = "insert into annotations (cod_user, mesg, data_post) ".
            "values ($id_user, '$mesg', now())";
        if ($con->query($query) === TRUE)
            return true;
        return false;
    }
    
    public static function delAnnotation($cod) {
        $con = self::conMySQL();
        $query = "delete from annotations where cod=$cod";
        if ($con->query($query) === TRUE)
            return true;
        return false;
    }
    
    public static function putUser($nick, $password, $mail='') {
        $con = self::conMySQL();
        $passwd = hash('sha256', $password);
        $query = "insert into users (nick, mail, password, data_create) ".
            "values ('$nick', '$mail', '$passwd', now())";
        if ($con->query($query) === TRUE)
            return true;
        return false;
    }
    
    public static function listAnnotations() {
        $query = "select * from annotations order by cod desc limit 5";
        $con = self::conMySQL();
        $response = array();
        
        if ($result = $con->query($query)) {
            while ($row = $result->fetch_assoc()) {
                $temp_arr = array();
                foreach ($row as $key => $value ) {
                    $temp_arr[$key] = $value;
                }
                array_push($response, $temp_arr);
            }
        }
        return $response;
    }
    
    public static function listUsers() {
        $query = "select * from users";
        if ($result = self::execSelect($query))
            return $result;
        else
            return null;
    }
    
    public static function listUsersById($id) {
        $query = "select * from users where cod=$id";
        if ($result = self::execSelect($query))
            return $result;
        else
            return null;
    }
    
    public static function listUsersByName($nick) {
        $query = "select * from users where nick='$nick'";
        if ($result = self::execSelect($query))
            return $result;
        else
            return null;
    }
    
}
// select * from annotations;
// select * from users;
/*
echo "Inicio de testes\n";
echo "insert in table users HandlerMySQL::putUser\n";
if (HandlerMySQL::putUser("admin", "password", "mail@gmail.com"))
    echo "inserção feita com sucesso!\n";
else
    echo "não foi possível inserir\n";
echo "-----------//----------\n";
echo "insert in table annotations HandlerMySQL::putAnnotation\n";
if (HandlerMySQL::putAnnotation(1, "Olá, amigo."))
    echo "inserção feita com sucesso!\n";
else
    echo "não foi possível inserir\n";
echo "-----------//----------\n";

echo "select in annotations HandlerMySQL::listAnnotations()\n";
print_r(HandlerMySQL::listAnnotations());
echo "-----------//----------\n";

$resp = HandlerMySQL::listUsersById(1);
if ($resp)
    print_r($resp);
else
    echo "void";
*/

//HandlerMySQL::updateAnnotation("haha", 20);

?>