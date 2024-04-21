<?php

class Database{

    public static $pdo;
    
    public static function connect(){
        try {
            self::$pdo = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';', DBUSER, DBPASS);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $pdo=self::$pdo;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        return self::$pdo;
    }
}

?>
