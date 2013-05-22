<?php

class Fonction_assoc_membre_object extends Object {


    
    private $_idassociation;
    private $_idmembre;
    private $_idfonction;
    private $_datefin;
    private $_datedebut;
    public function get_idassociation() {
        return $this->_idassociation;
    }

    public function get_idmembre() {
        return $this->_idmembre;
    }

    public function get_idfonction() {
        return $this->_idfonction;
    }

    public function get_datefin() {
        return $this->_datefin;
    }

    public function get_datedebut() {
        return $this->_datedebut;
    }

    public function set_idassociation($_idassociation) {
        $this->_idassociation = $_idassociation;
    }

    public function set_idmembre($_idmembre) {
        $this->_idmembre = $_idmembre;
    }

    public function set_idfonction($_idfonction) {
        $this->_idfonction = $_idfonction;
    }

    public function set_datefin($_datefin) {
        $this->_datefin = $_datefin;
    }

    public function set_datedebut($_datedebut) {
        $this->_datedebut = $_datedebut;
    }

    function __construct(array $entrees) {
        $this->_idassociation = $entrees['association_idassociation'];
        $this->_idmembre = $entrees['membre_idmembre'];
        $this->_idfonction = $entrees['fonction_ass_idfonction_ass'];
        $this->_datefin = $entrees['dfin_fonction'];
        $this->_datedebut = $entrees['ddebut_fonction'];
    }


}
?>
