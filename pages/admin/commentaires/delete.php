<?php

$commentaireTable = App::getInstance()->getTable('Commentaire');
//si des données ont été sauvegadée je les garde en parametre
if(!empty($_POST)){
    $result = $commentaireTable->delete($_POST['id']);
    header('Location: admin.php');
    
}


