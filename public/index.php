<?php
require '../app/Autoloader.php';

App\Autoloader::register();

if(isset($_GET['p'])){ //par défaut la page d'accueil
    $p =$_GET['p'];
}else {
    $p = 'home';
}

//Initialisation des objets

$db = new App\Database('Livre_Jean_Forteroche');


ob_start(); //met un content
if($p ==='home'){ 
    require '../pages/home.php';
} 
elseif ($p === 'my_Book'){
    require '../pages/my_Book.php';
}
elseif($p === 'chapitre'){
    require '../pages/chapitre.php';
}


$content = ob_get_clean(); // rajoute le header et footer
require '../pages/templates/default.php';

?>