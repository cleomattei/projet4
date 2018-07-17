<?php
/* __________________________________________________________________________________________________________________________________________________________________

ELLE RECUPERE TOUTES INFORMARTIONS DE CONFIGURATION DU FICHIER CONFIG.PHP

__________________________________________________________________________________________________________________________________________________________________ */


namespace Core;

class Config { //tableau qui contient toute ma config
    
    
    private $settings =[];
    private static $_instance; //créer une instance static
    
    // fonction pour retourner l'instance
    public static function getInstance($file){
        
        if(is_null(self::$_instance)){ //on empêche de recréer toujours une nouvelle instance on garde la même
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }
    
    // lis tout le dossier config et le met dans un tableau
    public function __construct($file){ 
        
        $this->settings = require ($file);  //dirname pour remonter d'un cran
    }
    
    //prend en paramètre la clé à obtenir parmis les valeurs dans le tableau settings
    public function get($key)
    {
        if(!isset($this->settings[$key])) { // on règle les cas où la clé existe pas
            return null;
        }
        return $this->settings[$key]; //on retourne la clé
    }
}