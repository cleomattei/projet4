<?php

$app = App::getInstance();
$chapitre = $app->getTable('Chapitre')->find($_GET['id']);

if($chapitre === false){
    $app->notFound();
}

$app->title = $chapitre->titre;
?>


<h1><?= $chapitre->titre; ?></h1>


<p><em><?= $chapitre->categorie; ?></em></p>


<p><?= $chapitre->contenu; ?></p>