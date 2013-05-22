<?php

class Animateur_model extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }

     public  function add(Animateur_object $animateur) {
        $add = $this->_db->prepare('INSERT INTO animateur(nanimateur,pranimateur,addanimateur,telanimateur,mailanimateur,cinanimateur,photoanimateur,cvanimateur,contranimateur) values(:nom,:prenom,:adresse,:tel,:email,:cin,:photo,:cv,:contrat)');

        $add->bindValue(':nom', $animateur->getNom());
        $add->bindValue(':prenom', $animateur->getPrenom());
        $add->bindValue(':adresse', $animateur->getAdresse());
        $add->bindValue(':email', $animateur->getEmail());
        $add->bindValue(':tel', $animateur->getTelephone());
        $add->bindValue(':cin', $animateur->getCin());
        $add->bindValue(':photo', $animateur->getPhoto());
        $add->bindValue(':cv', $animateur->getCv());
        $add->bindValue(':contrat', $animateur->getContrat());
        $add->execute();

        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }
/*
    public function delete(Animateur $anim) {
        // supprime un animateur de la base de données utilisation de la mèthode exec()
        $this->_db->exec('DELETE FROM Animateur WHERE id=' . $anim->getId() . ';');
    }*/

    public function update(Animateur_object $anim) {

        $inserto = $this->_db->prepare('UPDATE  animateur SET nanimateur=:nom,pranimateur=:prenom,addanimateur=:adresse,mailanimateur=:email,
        telanimateur=:tel,cinanimateur=:cin WHERE idanimateur=' . $anim->getId() . ';');



        $inserto->bindValue(':nom', $anim->getNom());
        $inserto->bindValue(':prenom', $anim->getPrenom());
        $inserto->bindValue(':adresse', $anim->getAdresse());
        $inserto->bindValue(':email', $anim->getEmail());
        $inserto->bindValue(':tel', $anim->getTelephone());
        $inserto->bindValue(':cin', $anim->getCin());


        $inserto->execute();
    }

    

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
    
   public function get_formation_animateur(){
       
       
       
   }

}

?>
