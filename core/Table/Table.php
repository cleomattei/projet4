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
        return $this->db->query("SELECT * FROM {$this->table}");
    }
    
    //création de la fonction find trouve un seul élément
    public function find($id){
        return $this->query("SELECT * FROM {$this->table} WHERE id =?", [$id], true);
    }
    
     //mettre a jour un objet
    public function update($id, $fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id =?", $attributes, true);
    }
    
     //création de la fonction delete 
    public function delete($id){
      
        return $this->query("DELETE FROM {$this->table} WHERE id =?", [$id], true);
    }
    
    public function create($fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        
        $sql_part = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }
    
    public function extract($key, $value){
        $records =$this->all();
        $return =[];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
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