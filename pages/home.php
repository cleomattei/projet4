<h1>Livre complet chapitre par chapitre</h1>

<?php foreach($db->query('SELECT * FROM chapitres', 'App\Table\Chapitre') as $chapitre): ?> <!--va chercher tous les chapitres -->


 
        <h2><a href="<?= $chapitre->url ?>"><?= $chapitre->titre; ?></a></h2>

        <p><?= $chapitre->getExtrait(); ?></p>
    
    
<?php endforeach; ?>
