<?php

$postTable = App::getInstance()->getTable('Chapitre');
//si des données ont été sauvegadée je les garde en parametre
if(!empty($_POST)){
    $result = $postTable->delete($_POST['id']);
    header('Location: admin.php');
    
}


