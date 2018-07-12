<?php

namespace App\Table;

class Chapitre{
    
    
    public function __get($key){ // on créer une méthode pour passer l'url en paramètre
        
        $method ='get' . ucfirst($key);
        $this->$key = $this->$method(); // stock en donnée d'instance la méhtode n'est plus appelé sur l'instance elle est appelé qu'une fois. 
        return $this->$key;
    }
    
    public function geturl(){
        return 'index.php?p=chapitre&id=' .$this->id;
    }
    
    public function getExtrait(){
        $html = '<p>' . substr($this->contenu, 0, 200) . '...</p>'; //substr = nombre de caractères à afficher
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}