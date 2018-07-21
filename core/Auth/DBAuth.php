<?php
// _______________________________________________________________________________________________________________________________________________________________________
namespace Core\Auth;

use Core\Database\Database;
// _______________________________________________________________________________________________________________________________________________________________________

class DBAuth {
    
    private $db;
    
    public function __construct(Database $db){
        $this->db =$db;
    }
    
    // on récupère l'id de l'utilisateur
    public function getUserId(){
       if($this->logged()){ //on vérifie que l'id existe
           return $_SESSION['auth'];
       } 
        return false;
    }
    /**
    * @param $username
    * @param $password
    * return boolean 
    */
    
    public function login($username, $password){
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
       if ($user){
           if($user->password === sha1($password)){
               $_SESSION['auth'] = $user->id;
               return true; // on regarde si le mdp correspond
       }
       }
        return false;
    }
    
    // on enregistre l'identifiant de l'utilisateur
    public function logged(){

        return isset($_SESSION['auth']);

    }
    
    public function logout(){
        unset ($_SESSION['auth']);
    }
}
