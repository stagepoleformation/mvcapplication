<?php

class Assiste_object extends Object {

   private $_idmembre;
   private $_idseance;
   private $_bolassiste;
   

   public function get_idmembre() {
       return $this->_idmembre;
   }

   public function get_idseance() {
       return $this->_idseance;
   }

   public function get_bolassiste() {
       return $this->_bolassiste;
   }

   public function set_idmembre($_idmembre) {
       $this->_idmembre = $_idmembre;
   }

   public function set_idseance($_idseance) {
       $this->_idseance = $_idseance;
   }

   public function set_bolassiste($_bolassiste) {
       $this->_bolassiste = $_bolassiste;
   }

   function __construct(array $donnees) {
   $this->_idmembre = $donnees["membre_idmembre"];
       $this->_idseance = $donnees["seance_idseance"];
       $this->_bolassiste = $donnees["bolassist"];
   }

    
    
    
}
?>
