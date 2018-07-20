<?php
/* __________________________________________________________________________________________________________________________________________________________________

LA CLASS POUR LA CONFIGURATION DU SITE = TITRE URL ...

__________________________________________________________________________________________________________________________________________________________________ */
use Core\Config;
use Core\Database\MysqlDatabase;
// _______________________________________________________________________________________________________________________________________________________________________

class App {
    
    public $title = "Jean Forteroche";
    private $db_instance;
    private static $_instance;
    
    
    // fonction pour retourner l'instance
    public static function getInstance(){
        
        if(is_null(self::$_instance)){ //on empêche de recréer toujours une nouvelle instance on garde la même
            self::$_instance = new App();
        }
        return self::$_instance;
    }
    
    public static function load(){
        session_start();
        require ROOT .'/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
    
    //elle créer un objet de la classe passée en parametre
    public function getTable($name){
        
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }
    
    //charge la configuration de la base de donnée
    public function getDb(){
        
        $config = Config::getInstance(ROOT. '/config/config.php');
        if(is_null($this->db_instance)){ // si l'instance de la Bd n'est pas encore créée on l'instancie
            //on instancie la classe base de donnée
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }
    
    public function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }
    
    public function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }
}

