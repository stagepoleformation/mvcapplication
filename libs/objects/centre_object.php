<?php

class Centre_object extends Object {
    
    private $_id;
    private $_nom;
    private $_adresse;
    private $_region;
    private $_type;

    function __construct($_id, $_nom, $_adresse, $_region, $_type) {
        $this->_id = $_id;
        $this->_nom = $_nom;
        $this->_adresse = $_adresse;
        $this->_region = $_region;
        $this->_type = $_type;
    }

    public function get_id() {
        return $this->_id;
    }

    public function set_id($_id) {
        $this->_id = $_id;
    }

    public function get_nom() {
        return $this->_nom;
    }

    public function set_nom($_nom) {
        $this->_nom = $_nom;
    }

    public function get_adresse() {
        return $this->_adresse;
    }

    public function set_adresse($_adresse) {
        $this->_adresse = $_adresse;
    }

    public function get_region() {
        return $this->_region;
    }

    public function set_region($_region) {
        $this->_region = $_region;
    }

    public function get_type() {
        return $this->_type;
    }

    public function set_type($_type) {
        $this->_type = $_type;
    }



}
?>
