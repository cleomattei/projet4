<?php

namespace App;

class Appp {
    
    const DB_NAME = 'Livre_Jean_Forteroche'; // on remet les constantes si elles changent un jour
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_HOST = 'localhost';
    
    private static $title ='Jean Forteroche'; //titre du site change en fonction des chapitres + title default
    private static $database;
   
    
    public static function getDb(){//initialise la connexion à la base de donnée
        if (self::$database === null){ // on initialise que pour la première fois
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST); 
            // on sauvegarde l'objet pour ne pas l'initialiser tout le temps et on appelle les constantes
        }
        return self::$database;
    }
    
    public static function notFound(){
    
            header("HTTP/1.0 404 Not Found");
            header('Location:index.php?p=404');
    }
    
    public static function getTitle(){ // return the title
        return self::$title;
    }
    
    public static function setTitle($title){//prend en parametre le titre à passer
        self::$title = $title . '|' . self::$title;
    }
}

