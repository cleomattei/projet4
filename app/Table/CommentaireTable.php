<?php
// _______________________________________________________________________________________________________________________________________________________________________

namespace App\Table;

use Core\Table\Table;
// _______________________________________________________________________________________________________________________________________________________________________

class CommentaireTable extends Table{
    
    protected $table = "commentaires"; // on donne un nom précis à la table
    
     /**
    * Récupère les derniers commentaires 
    * @return array
    */
    
    public function last ($chapitre_id){
        return $this->query("
            SELECT commentaires.id, commentaires.pseudo, commentaires.date_creation, commentaires.contenu
            FROM commentaires
            WHERE commentaires.chapitre_id = ".$chapitre_id."
            ORDER BY commentaires.id DESC
            ");
    }
}