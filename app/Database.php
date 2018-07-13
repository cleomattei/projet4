<?php

namespace App;

use \PDO ; 

class Database{
    
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    
    public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host ='localhost'){
        $this->db_name =$db_name;
        $this->db_user =$db_user;
        $this->db_pass =$db_name;
        $this->db_host =$db_name;
    }
    
    private function getPDO(){// au cas ou le pdo tombe en panne
        if($this->pdo === NULL) {
            $pdo = new PDO('mysql:dbname=Livre_Jean_Forteroche;host=localhost', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo =$pdo;
        }
        return $this->pdo;
    }
    
    public function query($request, $class_name, $one = false){//requête pour récupérer les résultats
        $req = $this->getPDO()->query($request);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
              
        if($one){
            $datas =$req->fetch();
        }
        else{
              $datas = $req->fetchAll();
        }
      
        return $datas;
    }
    
    public function prepare($request, $attributes, $class_name, $one = false){//on rajoute le dernier paramètre pour ne voir qu'un seul élément du tableau
        $req =$this->getPDO()->prepare($request);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        
        if($one){
            $datas =$req->fetch();
        }
        else{
              $datas = $req->fetchAll();
        }
      
        return $datas;
    }
}