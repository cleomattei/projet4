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

<h2><?= $chapitre->titre; ?></h2>

<p><?= $chapitre->contenu; ?></p>