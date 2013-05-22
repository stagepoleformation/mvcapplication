<?php

require_once 'libs/objects/Fonction_association_object.php';

class Assoc_membre_fonction_model extends Model {

    function __construct() {
                parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }

    
    
    public function add($id_membre,$id_association,$id_fonction,$ddebut,$dfin="0000-00-00")
    {
      //  print_r($id_membre);
    
      //  print_r($id_fonction);
          $add = $this->_db->prepare('INSERT INTO fonct_assoc_membre(association_idassociation,membre_idmembre,fonction_ass_idfonction_ass,ddebut_fonction,dfin_fonction) values(:idassociation,:idmembre,:idfonction,:ddebut,:dfin)');
        $add->bindValue(':idassociation', $id_association);
        $add->bindValue(':idmembre', $id_membre);
        $add->bindValue(':idfonction', $id_fonction);
        $add->bindValue(':ddebut', $ddebut);
        $add->bindValue(':dfin', $dfin);
        $add->execute();
     //  print_r($this->_db->errorinfo());
    }
    
     public function update($id_membre,$id_association,$id_fonction,$dfin)
    {
      //  print_r($id_membre);
    
      //  print_r($id_fonction);
          $add = $this->_db->
                  prepare('UPDATE fonct_assoc_membre set dfin_fonction=:dfin 
                      WHERE association_idassociation=:idassociation and membre_idmembre=:idmembre and fonction_ass_idfonction_ass=:idfonction');
        $add->bindValue(':idassociation', $id_association);
        $add->bindValue(':idmembre', $id_membre);
        $add->bindValue(':idfonction', $id_fonction);
        
        $add->bindValue(':dfin', $dfin);
        $add->execute();
     //  print_r($this->_db->errorinfo());
    }
    
    public function get_idfonction_nomfonction($idmembre,$idassociation)
    {
        
          $getall = $this->_db->query('SELECT * FROM fonction_ass WHERE idfonction_ass 
              IN (SELECT fonction_ass_idfonction_ass FROM fonct_assoc_membre WHERE association_idassociation='.$idassociation.' AND membre_idmembre='.$idmembre.' );');
             //  print_r($getall);
              // print_r($this->_db->errorinfo());
          //   print_r($where);
    
        while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {
            
          // print_r($donnees);
            $Object_tab[] = new Fonction_association_object($donnees);
        }
   
       if(isset($Object_tab)) return  $Object_tab;
        
    }
}
?>
