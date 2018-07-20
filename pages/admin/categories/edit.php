<?php

$table = App::getInstance()->getTable('Category');
//si des données ont été sauvegadée je les garde en parametre
if(!empty($_POST)){
    $result = $table->update($_GET['id'], [ // on enregistre les sauvegardes
        'titre' => $_POST['titre']
    ]);
    if($result){
       ?>
       <div class="alert alert-success">La catégorie a bien été modifiée</div>
       <?php
    }
}
$category = $table->find($_GET['id']);

$form = new \Core\HTML\BootstrapForm($category);//on récupère le chapitre en parametre

?>

<form method="post">
   
    <?= $form->input('titre','Titre de la catégorie'); ?>
    
    <button class="btn btn-primary">Sauvegarder</button>
    
</form>

