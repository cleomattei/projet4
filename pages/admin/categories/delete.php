<?php

$category = App::getInstance()->getTable('Category');
//si des données ont été sauvegadée je les garde en parametre
if(!empty($_POST)){
    $result = $category->delete($_POST['id']);
    header('Location: admin.php?p=categories.index');
    
}


