<?php

$postTable = App::getInstance()->getTable('Chapitre');
//si des données ont été sauvegadée je les garde en parametre
if(!empty($_POST)){
    $result = $postTable->create([ 
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'date_creation' => date("Y-m-d H:i:s"),
        'category_id' => $_POST['category_id']
    ]);
    if($result){ // on redirige vers la page d'édition quand l'article a été créé
        header('Location: admin.php');
    }
    
}

$categories = App::getInstance()->getTable('Category')->extract('id', 'titre');// on extrait d'abord la clé et ensuite les titres
$form = new \Core\HTML\BootstrapForm($_POST);//on récupère le chapitre en parametre

?>

    <form method="post">

        <?= $form->input('titre','Titre du chapitre'); ?>
            <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
                <?= $form->select('category_id', 'Catégorie', $categories); ?>

                    <button class="btn btn-primary">Sauvegarder</button>

    </form>
