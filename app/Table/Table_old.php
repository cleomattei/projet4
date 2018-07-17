<?php

namespace App\Table;

use App\App;

class Table{
    
    
    public static function find($id){ // on affiche les catégories par id
        return static::query("
        SELECT *
        FROM " . static::$table . "
        WHERE id = ?
        ", [$id], true);
    }
    
    public static function query($request, $attributes = null, $one = false){ //on factorise les appels à la base qui sont toujours les mêmes
        if($attributes){
            return App::getDb()->prepare($request, $attributes, get_called_class(), $one);
        }else {
            return App::getDb()->query($request, get_called_class(), $one);
        }
    }
    
    public static function all(){ // méthode générique pour accéder à la Db
        return App::getDb()->query("
        SELECT *
        FROM " . static::$table . "",
        get_called_class());
    }
    
    
    public function __get($key){ // on créer une méthode pour passer l'url en paramètre
        
        $method ='get' . ucfirst($key);
        $this->$key = $this->$method(); // stock en donnée d'instance la méhtode n'est plus appelé sur l'instance elle est appelé qu'une fois. 
        return $this->$key;
    }
  
}