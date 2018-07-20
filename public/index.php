<?php

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

if(isset($_GET['p'])){
    
    $page=$_GET['p'];
    
}else{
    $page ='blog';
}

ob_start();
if($page === 'blog'){
    require ROOT . '/pages/chapitres/blog.php';
    
}else if ($page === 'chapitres.categories'){
    require ROOT . '/pages/chapitres/category.php';
    
}else if ($page === 'chapitres.show'){
    require ROOT . '/pages/chapitres/show.php';
    
}else if ($page === 'chapitres.list'){
    require ROOT .'/pages/chapitres/list.php';
    
}else if ($page === 'jean_forteroche'){
    require ROOT . '/pages/jean_forteroche.html';
    
}else if ($page === 'login'){
    require ROOT . '/pages/users/login.php';
}


$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';