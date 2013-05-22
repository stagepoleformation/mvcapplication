<?php

class Anime_formation_object extends Object {
    
    private $id_formation;
    private $id_animateur;

    function __construct($id_formation, $id_animateur) {
        $this->id_formation = $id_formation;
        $this->id_animateur = $id_animateur;
    }

    public function getId_formation() {
        return $this->id_formation;
    }

    public function setId_formation($id_formation) {
        $this->id_formation = $id_formation;
    }

    public function getId_animateur() {
        return $this->id_animateur;
    }

    public function setId_animateur($id_animateur) {
        $this->id_animateur = $id_animateur;
    }



}
?>
