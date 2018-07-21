<?php

$commentaireTable = App::getInstance()->getTable('Commentaire');
$commentaire = $commentaireTable->find($_GET['id']);
//si des données ont été sauvegadée je les garde en parametre
$result = $postTable->update($_GET['id'], [ // on enregistre les sauvegardes
    'report' => '1'
]);
if($result){
   header('Location: admin.php?p=chapitres.edit&id=' . App::getInstance()->getDb()->lastInsertId());

}