<?php

$chapitres = App::getInstance()->getTable('Chapitre')->all();
$categories = App::getInstance()->getTable('Category')->all();
$commentaires = App::getInstance()->getTable('Commentaire')->all();

?>
<h1>Administration</h1>
<h2>Administrer les chapitres</h2>

<p>
    <a href="?p=chapitres.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    
    <thead>
        
        <tr>
            
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
            
        </tr> 
        
    </thead>

    <tbody>
        <?php foreach($chapitres as $chapitre): ?> <!-- on recherche tous les chapitres -->
            <tr>
                
                <td><?= $chapitre->id; ?></td>
                <td><?= $chapitre->titre; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=chapitres.edit&id=<?= $chapitre->id; ?>">Editer</a>
                     <form action="?p=chapitres.delete" method="post" style="display: inline"> <!-- formulaire pour empêcher de supp par erreur dans l'url -->
                        <input type="hidden" name="id" value="<?= $chapitre->id ?>">
                        <button type="submit" class="btn btn-danger" href="?p=chapitres.delete&id=<?= $chapitre->id; ?>">Supprimer</button>
                    </form>
                </td>
                
            </tr>
        <?php endforeach; ?>

    </tbody>

</table>

<h2>Administrer les catégories</h2>


<p>
    <a href="?p=categories.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    
    <thead>
        
        <tr>
            
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
            
        </tr> 
        
    </thead>

    <tbody>
        <?php foreach($categories as $category): ?> <!-- on recherche tous les chapitres -->
            <tr>
                
                <td><?= $category->id; ?></td>
                <td><?= $category->titre; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=categories.edit&id=<?= $category->id; ?>">Editer</a>
                     <form action="?p=categories.delete" method="post" style="display: inline"> <!-- formulaire pour empêcher de supp par erreur dans l'url -->
                        <input type="hidden" name="id" value="<?= $category->id ?>">
                        <button type="submit" class="btn btn-danger" >Supprimer</button>
                    </form>
                </td>
                
            </tr>
        <?php endforeach; ?>

    </tbody>

</table>

<h2>Administrer les commentaires</h2>

<table class="table">
    
    <thead>
        
        <tr>
            
            <td>ID</td>
            <td>Chapitre ID</td>
            <td>Pseudo</td>
            <td>Date de création</td>
            <td>Contenu</td>
            <td>Signalé</td>
            <td>Actions</td>
            
        </tr> 
        
    </thead>

    <tbody>
        <?php foreach($commentaires as $commentaire): ?> <!-- on recherche tous les chapitres -->
            <tr>
                
                <td><?= $commentaire->id; ?></td>
                <td><?= $commentaire->chapitre_id; ?></td>
                <td><?= $commentaire->pseudo; ?></td>
                <td><?= $commentaire->date_creation; ?></td>
                <td><?= $commentaire->contenu; ?></td> 
                <td><?php 
                    if($commentaire->report == 1)
                        echo "Signalé" ; 
                    else 
                        echo "-"; 
                ?></td>
                <td>
                     <form action="?p=commentaires.delete" method="post" style="display: inline"> <!-- formulaire pour empêcher de supp par erreur dans l'url -->
                        <input type="hidden" name="id" value="<?= $commentaire->id ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
                
            </tr>
        <?php endforeach; ?>

    </tbody>

</table>