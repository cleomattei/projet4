<?php

$table = App::getInstance()->getTable('Category');
//si des données ont été sauvegadée je les garde en parametre
if(!empty($_POST)){
    $result = $table->create([ 
        'titre' => $_POST['titre']
    ]);
    if($result){ // on redirige vers la page d'édition quand l'article a été créé
        header('Location: admin.php?p=categories.index');
    }
    
}

$form = new \Core\HTML\BootstrapForm($_POST);//on récupère le chapitre en parametre

?>

<form method="post">
   
    <?= $form->input('titre','Titre de la catégorie'); ?>
    
    <button class="btn btn-primary">Sauvegarder</button>
    
</form>

