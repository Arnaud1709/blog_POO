<?php

class Database {

private static $instance = null;

// Fonction de connexion
 public static function getPdo(){
    
    
    if(self::$instance === null){
        self::$instance = new PDO('mysql:host=localhost;blogpoo;charset=utf8', 'root', '',[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

return self::$instance;
 }
}
