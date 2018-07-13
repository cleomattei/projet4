<?php

namespace App\Table;

use App\App;

class Chapitre extends Table{ //chapitre est l'héritier de Table
    
    protected static $table ='chapitres';
    
     public static function find($id){ // on affiche les catégories par id
        return static::query("
        SELECT *
        FROM " . static::$table . "
        WHERE id = ?
        ", [$id], true);
    }
    
    public static function getLast(){
        return self::query('SELECT *
        FROM chapitres
        ');//la class remplace le lien App\Table\Chapitre
    }
    
    public static function lastByCategory($category_id){
       return self::query('
        SELECT chapitres.id, chapitres.titre, chapitres.contenu, categories.titre as categorie 
        FROM chapitres
        LEFT JOIN categories
            ON category_id = categories.id
        WHERE category_id :?
        ODER BY chapitres.date ASC
        ',[$category_id]);
    }
    
    public function __get($key){ // on créer une méthode pour passer l'url en paramètre
        
        $method ='get' . ucfirst($key);
        $this->$key = $this->$method(); // stock en donnée d'instance la méhtode n'est plus appelé sur l'instance elle est appelé qu'une fois. 
        return $this->$key;
    }
    
    public function geturl(){
        return 'index.php?p=chapitre&id=' .$this->id;
    }
    
    public function getExtrait(){
        $html = '<p>' . substr($this->contenu, 0, 350) . '...</p>'; //substr = nombre de caractères à afficher
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}