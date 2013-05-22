<?php

class Formation_model extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }

     public  function add(Formation_object $formation) {
       //  print_r($formation);
        $add = $this->_db->prepare('INSERT INTO formation(intiformation,eformation,adeformation,tformation,fformation,dformation,planacces) values(:intitule,:emplacement,:adrempl,:typef,:date_fin,:date_debut,:planacc)');
        $add->bindValue(':intitule', $formation->getIntitule());
        $add->bindValue(':emplacement', $formation->getEmplacement());
        $add->bindValue(':adrempl', $formation->getAdrsempl());
        $add->bindValue(':typef', $formation->getType());
        $add->bindValue(':date_fin', $formation->getDate_f());
        $add->bindValue(':date_debut', $formation->getDate_d());
        $add->bindValue(':planacc', $formation->getPlan());
        $add->execute();
//print_r($add->errorinfo());
        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }

  

    public function update(Formation_object $formation) {
        $inserto = $this->_db->prepare('UPDATE  formation SET intiformation=:intitule,eformation=:emplc,adeformation=:adresse_emplc,tformation=:type,fformation=:dfin,dformation=:dd WHERE idformation=' . $formation->getId() . ';');

print_r($formation);

        $inserto->bindValue(':intitule', $formation->getIntitule());
        $inserto->bindValue(':emplc', $formation->getEmplacement());
        $inserto->bindValue(':adresse_emplc', $formation->getAdrsempl());
        $inserto->bindValue(':type', $formation->getType());
        $inserto->bindValue(':dfin', $formation->getDate_f());
        $inserto->bindValue(':dd', $formation->getDate_d());



        $inserto->execute();
        print_r($inserto->errorinfo());
    }

    

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
    
    public function getassociation_assiste_to_formation($idformation) {


        //retourne la liste de tous les Object(animateur, association, formation ...) de la base de données

        $getall = $this->_db->query('SELECT idassociation,nassociation,boolreponse FROM association join invitation on idassociation=association_idassociation where formation_idformation='.$idformation.';');

        //   print_r($where);
$tab=array();
        while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {

            // print_r($donnees);
           $tab[] = $donnees;
        }

        if (isset($tab))
            return $tab;
    }
    
    

}
?>
