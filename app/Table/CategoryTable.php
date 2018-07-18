<?php
// _______________________________________________________________________________________________________________________________________________________________________

namespace App\Table;

use Core\Table\Table;
// _______________________________________________________________________________________________________________________________________________________________________

class CategoryTable extends Table{
    
    protected $table ="categories"; // on donne un nom précis à la table
    
     /**
    * Récupère les derniers categories 
    * @return array
    */
    
    public function last (){
        return $this->query("
            SELECT categories.id, categories.titre
            FROM categories
            ");
    }
    
        /**
    * Récupère la catégorie 
    * @param *id int
    * @return \App\Entity\CategoryEntity
    */
    
    public function find ($id){
        return $this->query("
            SELECT categories.id, categories.titre
            FROM categories
            WHERE categories.id =?", [$id], true);
    }
}