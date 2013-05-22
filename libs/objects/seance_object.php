<?php

class Seance_object extends Object {
    
    private $_id;
    private $_nom;
    private $_groupeid;
    private $_datedebut;
    private $_datefin;

    function __construct(array $entrees) {
        
     $this->set_id($entrees["idseance"]);
      $this->set_nom($entrees["nseance"]);
       $this->set_groupeid($entrees["groupe_idgroupe"]);
        $this->set_datedebut($entrees["ddseance"]);
         $this->set_datefin($entrees["dfseance"]);
        
    //  print_r($this);
    }

   public function get_id() { return $this->_id; } 
public function get_nom() { return $this->_nom; } 
public function get_groupeid() { return $this->_groupeid; } 
public function get_datedebut() { return $this->_datedebut; } 
public function get_datefin() { return $this->_datefin; } 
public function set_id($x) { $this->_id = $x; } 
public function set_nom($x) { $this->_nom = $x; } 
public function set_groupeid($x) { $this->_groupeid = $x; } 
public function set_datedebut($x) { $this->_datedebut = $x; } 
public function set_datefin($x) { $this->_datefin = $x; } 
}
?>
