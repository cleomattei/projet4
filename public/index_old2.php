<?php
/* __________________________________________________________________________________________________________________________________________________________________

ELLE CREER UN OBJET DE LA CLASSE CONFIG
ELLE CREER UNE INSTANCE DE LA CLASSE APP
ELLE INSTANCIE LES DIFFERENTES CLASSES DU SITE

__________________________________________________________________________________________________________________________________________________________________ */
//ON DEMANDE CE QUON VEUX A NOS INSTANCES

session_start();//initialise une session utilisateur

require '../app/Autoloader.php';

App\Autoloader::register();

$config = App\Config::getInstance();//donne l'instance de l'objet -> récupère les infos qu'on veux
$app = App\App::getInstance();

/* _______________________________________________________________________________________________________________________________________________________________________
$chapitres = App\App::getTable('Chapitres');
$users = App\App::getTable('Users');
$categories = App\App::getTable('Categories');

 ______________________________________________________________________________________________________________________________________________________________________ */

//les mêmes en plus simplifiées / on remplace par des flèches à partir du moment où on a envoyé la ligne: $app App\App::getInstance
$chapitres = $app->getTable('Chapitres');
$users = $app->getTable('Users');
$categories = $app->getTable('Categories');

var_dump($chapitres->all());