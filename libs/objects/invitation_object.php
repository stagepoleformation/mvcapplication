<?php

class Invitation_object extends Object {
    
    private $_formationid;
    private $_associationid;
    private $_bool;
    public function get_formationid() {
        return $this->_formationid;
    }

    public function get_associationid() {
        return $this->_associationid;
    }


    public function get_bool() {
        return $this->_bool;
    }

    public function set_formationid($_formationid) {
        $this->_formationid = $_formationid;
    }

    public function set_associationid($_associationid) {
        $this->_associationid = $_associationid;
    }

 

    public function set_bool($_bool) {
        $this->_bool = $_bool;
    }

    function __construct(array $entrees) {
         $this-> set_formationid($entrees["formation_idformation"]);
      $this->set_associationid($entrees["association_idassociation"]);
      
        $this->set_bool($entrees["boolreponse"]);
    }

  

}
?>
