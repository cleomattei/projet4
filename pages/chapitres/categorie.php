<?php
// _______________________________________________________________________________________________________________________________________________________________________

use App\App;
use App\Table\Chapitre;
use App\Table\Categorie;
// _______________________________________________________________________________________________________________________________________________________________________

//on récupère les catégories
$categorie = Categorie::find($_GET['id']); 
if($categorie ===false){ //on prévoit les cas ou les catégories n'existent pas et on fait une redirection
    App::notFound();
}
//on récupère les chapitres
$articles = Chapitre::lastByCategory($_GET['id']);

//liste des catégories
$categories= Categorie::all();

?>
<h1><?= $categorie->titre ?></h1>

<div class="row">
    <div class="col-sm-8">
        <?php foreach($chapitres as $chapitre): ?> <!--va chercher tous les chapitres -->

        <!-- plus besoin de se soucier d'aller chercher la base de donnée juste besoin de mettre App\App::getDb-->

                <h2><a href="<?= $chapitre->url ?>"><?= $chapitre->titre; ?></a></h2>

                <p><?= $chapitre->getExtrait(); ?></p>


        <?php endforeach; ?>
     </div>
    
     <div class="col-sm-4">
        <ul>
        <?php foreach(\App\Table\Chapitre::getLast() as $chapitre): ?> 
            <li><a href="<?= $chapitre->url; ?>"><?= $chapitre->titre; ?></a></li>
        <?php endforeach; ?>
        </ul>
    
    </div>
</div>