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
    
}else if ($page === 'chapitres.index'){
    require ROOT . '/pages/admin/chapitres/index.php';
    
}else if ($page === 'chapitres.edit'){
    require ROOT . '/pages/admin/chapitres/edit.php';
    
}else if ($page === 'chapitres.add'){
    require ROOT . '/pages/admin/chapitres/add.php';
    
}else if ($page === 'chapitres.delete'){
    require ROOT . '/pages/admin/chapitres/delete.php';
    
    
}else if($page === 'categories.index'){
    require ROOT . '/pages/admin/categories/index.php';
    
}else if ($page === 'categories.edit'){
    require ROOT . '/pages/admin/categories/edit.php';
    
}else if ($page === 'categories.add'){
    require ROOT . '/pages/admin/categories/add.php';
    
}else if ($page === 'categories.delete'){
    require ROOT . '/pages/admin/categories/delete.php';


}else if($page === 'commentaires.index'){
    require ROOT . '/pages/admin/commentaires/index.php';   
    
}else if ($page === 'commentaires.delete'){
    require ROOT . '/pages/admin/commentaires/delete.php';
    
}else if ($page === 'login'){
header('Location: admin.php');
    
}else if ($page === 'logout'){
require ROOT . '/pages/admin/logout.php';
}

$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';