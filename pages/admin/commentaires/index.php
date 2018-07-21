<?php

$commentaires = App::getInstance()->getTable('Commentaire')->all();


?>
<h1>Administration</h1>
<h2>Administrer les commentaires</h2>

<table class="table">
    
    <thead>
        
        <tr>
            
            <td>ID</td>
            <td>Chapitre ID</td>
            <td>Pseudo</td>
            <td>Date de création</td>
            <td>Contenu</td>
            <td>Signalement</td>
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
                    
                    if($commentaire->report == 1) {
                        echo 'Signalé';
                    }else {
                        echo '-';
                    }
;                    
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


