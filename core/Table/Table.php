<?php
// _______________________________________________________________________________________________________________________________________________________________________

namespace Core\Table;
use Core\Database\Database;
// _______________________________________________________________________________________________________________________________________________________________________    

class Table { 
    
    protected $table; //protected pour que les enfants puissent l'utiliser
    protected $db;
    
    //on devine le nom de la table à partir du nom de la classe
    public function __construct(Database $db){//on met les parametres pour se connecter direct à la bsse de donnée depuis la classe tab
        $this->db =$db;
        if(is_null($this->table)){ // s'il n'y a pas de nom de table rentré par défaut on fait la suite
            
            $parts = explode('\\', get_class($this)); //divise les \ en tableau
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table','', $class_name)) . 's';
        }
        
    }
    
    public function all(){
        return $this->db->query('SELECT * FROM chapitres');
    }
    
    //création de la fonction find trouve un seul élément
    public function find($id){
        return $this->query("SELECT * FROM {$this->table} WHERE id =?", [$id], true);
    }
    
    //appel a la base de donnée + query pour requete sql
    public function query ($request, $attributes = null, $one =false){
        if($attributes){
            return $this->db->prepare(
                $request, 
                $attributes, 
                str_replace ('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
             return $this->db->query(
                $request,  
                str_replace ('Table', 'Entity', get_class($this)),
                $one
            );
            
        }
    }
}