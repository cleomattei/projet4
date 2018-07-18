<?php
// _______________________________________________________________________________________________________________________________________________________________________

$app = App::getInstance();
// _______________________________________________________________________________________________________________________________________________________________________

//on récupère les catégories
$categorie =$app->getTable('Category')->find($_GET['id']);
if($categorie ===false){ //on prévoit les cas ou les catégories n'existent pas et on fait une redirection
    $app->notFound();
}
//on récupère les chapitres
$articles = $app->getTable('Chapitre')->lastByCategory($_GET['id']);

//récupère toutes les catégories
$categories= $app->getTable('Category')->all();

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
        <?php foreach($categories as $category): ?> 
            <li><a href="<?= $category->url; ?>"><?= $category->titre; ?></a></li>
        <?php endforeach; ?>
        </ul>
    
    </div>
</div>