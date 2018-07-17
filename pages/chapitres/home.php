<h1>Livre complet chapitre par chapitre</h1>

<div class="row">
    <div class="col-sm-8">
        <?php foreach(App::getInstance()->getTable('Chapitre')->last() as $chapitre): ?> <!--va chercher tous les chapitres -->

        <!-- plus besoin de se soucier d'aller chercher la base de donnée juste besoin de mettre App\App::getDb-->

                <h2><a href="<?= $chapitre->url ?>"><?= $chapitre->titre; ?></a></h2>

                <p><?= $chapitre->getExtrait(); ?></p>


        <?php endforeach; ?>
     </div>
    
     <div class="col-sm-4">
        <ul>
        <?php foreach(App::getInstance()->getTable('Chapitre')->last()  as $chapitre): ?> 
            <li><a href="<?= $chapitre->url; ?>"><?= $chapitre->titre; ?></a></li>
        <?php endforeach; ?>
        </ul>
    
    </div>
</div>
    