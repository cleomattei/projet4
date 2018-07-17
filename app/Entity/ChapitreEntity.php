<?php
// _______________________________________________________________________________________________________________________________________________________________________

namespace App\Entity;

use Core\Entity\Entity;
// _______________________________________________________________________________________________________________________________________________________________________

class ChapitreEntity extends Entity{
    
  public function getUrl(){
        return 'index.php?p=chapitre&id=' .$this->id;
    }
    
    public function getExtrait(){
        $html = '<p>' . substr($this->contenu, 0, 350) . '...</p>'; //substr = nombre de caractères à afficher
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
        return $html;
    }
}