<?php
// _______________________________________________________________________________________________________________________________________________________________________
use Core\Auth\DBAuth;
// _______________________________________________________________________________________________________________________________________________________________________

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

if(isset($_GET['p'])){
    
    $page=$_GET['p'];
    
}else{
    $page ='home';
}


//Auth on transmet la connexion avec App::getInstance->getDb

$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if(!$auth->logged()){
    $app->forbidden();
}


ob_start();
if($page === 'home'){
    require ROOT . '/pages/admin/home.php';
    
}else if ($page === 'chapitres.edit'){
    require ROOT . '/pages/admin/chapitres/edit.php';
    
}else if ($page === 'chapitres.show'){
    require ROOT . '/pages/admin/chapitres/show.php';
    
}else if ($page === 'chapitres.add'){
    require ROOT . '/pages/admin/chapitres/add.php';
    
}else if ($page === 'chapitres.delete'){
    require ROOT . '/pages/admin/chapitres/delete.php';
}

$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';