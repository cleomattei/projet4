<?php

$app = App::getInstance();
$chapitres = $app->getTable('Chapitre')->theLast();


$app->title = 'blog';
?>

<div class="row">
    <div class="col-sm-8">
        <?php foreach($chapitres as $chapitre):?>
            <h1><?= $chapitre->titre; ?></h1>


            <p><em><?= $chapitre->categorie; ?></em></p>


            <p><?= $chapitre->getExtrait(2000); ?></p>
<?php endforeach;?>

     </div>
    
    
     <div class="col-sm-4">
        <ul>
        <?php foreach(App::getInstance()->getTable('Category')->last()  as $category): ?> 
            <li><a href="<?= $category->url; ?>"><?= $category->titre; ?></a></li>
        <?php endforeach; ?>
        </ul>
    
    </div>
</div>
    