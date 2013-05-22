<?php

class Groupe_object extends Object {

    private $_id;
    private $_nom;
    private $_piblic_cible;
    private $_id_formation;
    
    
    function __construct(array $entrees) {
        
        $this->setId($entrees['idgroupe']);
        $this->setNom($entrees['ngroupe']);
        $this->setIdFormation($entrees['formation_idformation']);
        $this->setPubliccible($entrees['pcgroupe']);
    }

    
    public function getId()
    {
        return $this->_id;
    }
    
    public function getIdFormation()
    {
        return $this->_id_formation;
    }
    public function getNom()
    {
        return $this->_nom;
    }
    public function getPublic()
    {
        return $this->_piblic_cible;
    }
    
    public function setId($id)
    {
        $this->_id=$id;
        
    }
    public function setIdFormation($idFormation)
    {
        $this->_id_formation=$idFormation;
        
    }
    public function setNom($nom)
    {
        $this->_nom=$nom;
        
    }
    public function setPubliccible($publiccible)
    {
        $this->_piblic_cible=$publiccible;
        
    }
}
?>
