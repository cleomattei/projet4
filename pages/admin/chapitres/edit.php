<?php

$postTable = App::getInstance()->getTable('Chapitre');
//si des données ont été sauvegadée je les garde en parametre
if(!empty($_POST)){
    $result = $postTable->update($_GET['id'], [ // on enregistre les sauvegardes
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'category_id' => $_POST['category_id']
    ]);
    if($result){
        header('Location: admin.php?p=chapitres.edit&id=' . App::getInstance()->getDb()->lastInsertId());
    }
}
$chapitre = $postTable->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->extract('id', 'titre');// on extrait d'abord la clé et ensuite les titres
$form = new \Core\HTML\BootstrapForm($chapitre);//on récupère le chapitre en parametre

?>

<form method="post">
   
    <?= $form->input('titre','Titre du chapitre'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?>
    
    <button class="btn btn-primary">Sauvegarder</button>
    
</form>

