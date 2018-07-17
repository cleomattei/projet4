<?php
// _______________________________________________________________________________________________________________________________________________________________________

namespace App\Table;
use Core\Table\Table;

// _______________________________________________________________________________________________________________________________________________________________________

class ChapitreTable extends Table{
    
    /**
    * Récupère les derniers chapitres
    * @return array
    */
    
    public function last (){
        return $this->query("
            SELECT chapitres.id, chapitres.titre, chapitres.contenu, chapitres.date_creation
            FROM chapitres
            ORDER BY date_creation DESC");
    }
}
