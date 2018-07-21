<?php
// _______________________________________________________________________________________________________________________________________________________________________

namespace App\Table;
use Core\Table\Table;

// _______________________________________________________________________________________________________________________________________________________________________

class ChapitreTable extends Table{
    
    protected $table ='chapitres';
    /**
    * Récupère les derniers chapitres 
    * @return array
    */
    
    public function last (){
        return $this->query("
            SELECT chapitres.id, chapitres.titre, chapitres.contenu, chapitres.date_creation, categories.titre as categorie
            FROM chapitres
            LEFT JOIN categories ON category_id = categories.id
            WHERE categories.id = 1
            ORDER BY chapitres.date_creation ASC");
    }
    
        /**
    * Récupère les derniers chapitres 
    * @return array
    */
    
    public function allById (){
        return $this->query("
            SELECT chapitres.id, chapitres.titre, chapitres.contenu, chapitres.date_creation, categories.titre as categorie, categories.id as categorie_id 
            FROM chapitres
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY chapitres.date_creation DESC");
    }
    
    /** Récupère les derniers chapitres de la categories 
    *@param $category_id int
    *@return array
    */
    public function lastByCategory ($category_id){
        return $this->query("
            SELECT chapitres.id, chapitres.titre, chapitres.contenu, chapitres.date_creation, categories.titre as categorie 
            FROM chapitres
            LEFT JOIN categories ON category_id = categories.id
            WHERE chapitres.category_id =?
            ORDER BY chapitres.date_creation ASC", [$category_id]);
    }
    
    /**
    * Récupère les derniers chapitres en liant la catégorie associée
    * @param *id int
    * @return \App\Entity\ChapitreEntity
    */
    
    public function findWidthCategory($id){
        return $this->query("
            SELECT chapitres.id, chapitres.titre, chapitres.contenu, chapitres.date_creation, categories.titre as categorie 
            FROM chapitres
            LEFT JOIN categories ON category_id = categories.id
            WHERE chapitres.id =?", [$id], true);
    }
    
    // _______________________________________________________________________________________________________________________________________________________________________
    /**
    * Récupère LE dernier chapitre 
    * @return array
    */
    
    public function theLast (){
        return $this->query("
            SELECT chapitres.id, chapitres.titre, chapitres.contenu, chapitres.date_creation, categories.titre as categorie 
            FROM chapitres
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY chapitres.date_creation DESC
            LIMIT 0,3"
            );
    }
}
