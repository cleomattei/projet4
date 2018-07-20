<?php

use App\App;
use App\Table\Categorie;
use App\Table\Chapitre;


$chapitre = Chapitre::find($_GET['id']);
if($chapitre ===false){
    App::notFound();
}

App::setTitle($chapitre->titre);
    
?>

<h1><?= $chapitre->titre; ?></h1>

<p><?= $chapitre->contenu; ?></p>