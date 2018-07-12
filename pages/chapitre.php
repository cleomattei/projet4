<?php

$chapitre = $db->prepare('SELECT * FROM chapitres WHERE id= ?', [$_GET['id']], 'App\Table\Chapitre', true);

?>

<h1><?= $chapitre->titre; ?></h1>

<p><?= $chapitre->contenu; ?></p>