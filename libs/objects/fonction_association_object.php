<?php

class Fonction_association_object extends Object{

    private $_id_focntion;
    private $_nom_fonction;


    public function get_nom_fonction() {
        return $this->_nom_fonction;
    }

    public function set_nom_fonction($_nom_fonction) {
        $this->_nom_fonction = $_nom_fonction;
    }

    public function get_id_focntion() {
        return $this->_id_focntion;
    }

    public function set_id_fonction($_id_focntionn) {
        $this->_id_focntion = $_id_focntionn;
    }



   

    function __construct(array $entrees) {
     //   echo $_nom_fonction;
      //  print_r($entrees);
     
        $this->set_nom_fonction($entrees['nomfonction_ass']);
        $this->set_id_fonction($entrees['idfonction_ass']);
   
    }


}

?>
