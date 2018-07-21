<?php

/* __________________________________________________________________________________________________________________________________________________________________

AFFICHAGE DE LA PAGE

__________________________________________________________________________________________________________________________________________________________________ */

$app = App::getInstance();
$chapitre = $app->getTable('Chapitre')->findWidthCategory($_GET['id']);

if($chapitre === false){
    $app->notFound();
}

$app->title = $chapitre->titre;
?>


<h1><?= $chapitre->titre; ?></h1>


<p><em><?= $chapitre->categorie; ?></em></p>


<p><?= $chapitre->contenu; ?></p>


<?php

/* __________________________________________________________________________________________________________________________________________________________________

RECUPERATION DE LA GESTION DES COMMENTAIRES (COMMENTAIRETABLE)

__________________________________________________________________________________________________________________________________________________________________ */

$commentaireTable = App::getInstance()->getTable('Commentaire');

/* __________________________________________________________________________________________________________________________________________________________________

GESTION DES FORMULAIRES

__________________________________________________________________________________________________________________________________________________________________ */

if(!empty($_POST)){
    if($_POST['form'] == 1) {
        $result = $commentaireTable->update(
            $_POST['id'],
            [ 
                'report' => '1',
            ]
        );
        if($result){ // on redirige vers la page d'édition quand l'article a été créé
            ?>
           <div class="alert alert-success">Le commentaire a bien été signalé</div>
           <?php
        }
    }
    else if($_POST['form'] == 2) {
        $result = $commentaireTable->create([ 
            'pseudo' => $_POST['pseudo'],
            'date_creation' => date("Y-m-d H:i:s"),
            'chapitre_id' => $chapitre->id,
            'contenu' => $_POST['contenu']
        ]);
        if($result){ // on redirige vers la page d'édition quand l'article a été créé
            ?>
           <div class="alert alert-success">Le commentaire a bien été créé</div>
           <?php
        }
    }
}

/* __________________________________________________________________________________________________________________________________________________________________

AFFICHAGE DES COMMENTAIRES

__________________________________________________________________________________________________________________________________________________________________ */
$commentaires = $commentaireTable->last($chapitre->id);
?>
<h2>Commentaires</h2>

<?php foreach($commentaires as $commentaire): ?> <!-- on recherche tous les chapitres -->

    <p><?= $commentaire->pseudo; ?></p>
    <p><?= $commentaire->date_creation; ?></p>
    <p><?= $commentaire->contenu; ?></p>

    <form method="post" style="display: inline"> <!-- formulaire pour empêcher de supp par erreur dans l'url -->
        <input type="hidden" name="form" value="1">
        <input type="hidden" name="id" value="<?= $commentaire->id; ?>">
        <button type="submit" class="btn btn-danger">Signaler</button>
    </form>

    
<hr />
<?php endforeach; 

/* __________________________________________________________________________________________________________________________________________________________________

AFFICHAGE DU FORMULAIRE DAJOUT DE COMMENTAIRE

__________________________________________________________________________________________________________________________________________________________________ */

$form = new \Core\HTML\BootstrapForm($_POST);//on récupère le chapitre en parametre

?>

<h2>Ajouter un commentaire</h2>
<form method="post">
   <input type="hidden" name="form" value="2">
    <?= $form->input('pseudo','Pseudo'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    
    <button class="btn btn-primary">Sauvegarder</button>
    
</form>

