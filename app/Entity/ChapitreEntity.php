<?php
// _______________________________________________________________________________________________________________________________________________________________________

namespace App\Entity;

use Core\Entity\Entity;
// _______________________________________________________________________________________________________________________________________________________________________

class ChapitreEntity extends Entity{
    
  public function getUrl(){
        return 'index.php?p=chapitres.show&id=' .$this->id;
    }
    
    public function getExtrait($lenght = NULL){
        if($lenght === NULL){
            $lenght = 350;
        }
        $html = '<p>' . substr($this->contenu, 0, $lenght) . '...</p>'; //substr = nombre de caractères à afficher
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
        return $html;
    }
}