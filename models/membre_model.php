<?php
require_once 'libs/objects/membre_object.php';

class Membre_model extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }

     public  function add(Membre_object $membre) {
       //  print_r($membre);
        $add = $this->_db->prepare('INSERT INTO membre(nmembre,pnmembre,addmembre,telmembre,mailmembre,cinmembre) values(:nom,:prenom,:adresse,:tel,:email,:cin)');

        $add->bindValue(':nom', $membre->getNom());
        $add->bindValue(':prenom', $membre->getPrenom());
        $add->bindValue(':adresse', $membre->getAdresse());
        $add->bindValue(':email', $membre->getEmail());
        $add->bindValue(':tel', $membre->getTelephone());
        $add->bindValue(':cin', $membre->getCin());
        $add->execute();
       //print_r($add->errorinfo());
       return $this->_db->lastInsertId();
       
       
        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }
/*
    public function delete(Animateur $membre) {
        // supprime un animateur de la base de données utilisation de la mèthode exec()
        $this->_db->exec('DELETE FROM Animateur WHERE id=' . $membre->getId() . ';');
    }*/

    public function update(Membre_object $membre) {

        $inserto = $this->_db->prepare('UPDATE  membre SET nmembre=:nom,addmembre=:adresse,telmembre=:tel,mailmembre=:email,cinmembre=:cin,pnmembre=:prenom WHERE idmembre=:id ;');


        $inserto->bindValue(':id', $membre->getId());
        $inserto->bindValue(':nom', $membre->getNom());
        $inserto->bindValue(':prenom', $membre->getPrenom());
        $inserto->bindValue(':adresse', $membre->getAdresse());
        $inserto->bindValue(':email', $membre->getEmail());
        $inserto->bindValue(':tel', $membre->getTelephone());
        $inserto->bindValue(':cin', $membre->getCin());


        $inserto->execute();
       // print_r($inserto->errorinfo());
    }

    

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
    
   
   
    public  function get_membre_by_association_id($id) {
        
       
        //retourne la liste de tous les Object(animateur, association, formation ...) de la base de données
     
                $getall = $this->_db->query('SELECT idmembre,nmembre,addmembre,telmembre,mailmembre,cinmembre,pnmembre,nomfonction_ass FROM membre join fonction_ass on idmembre=membre_idmembre  WHERE idmembre IN (SELECT membre_idmembre FROM fonction_ass WHERE association_idassociation='.$id.');');
                
     //print_r($getall);
    $fonction=array();
        while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {
         //   print_r($donnees);
        $membre= array_slice($donnees,0,7);
            $Object_tab[] = new Membre_object($membre);
        $fonction[]=array_slice($donnees,7,8);
           
        }
      //  print_r(array($Object_tab,$fonction));
           
       if(isset($Object_tab) && isset($fonction)) return  array($Object_tab,$fonction);
    }
    
    
        public  function get_membre_of_association($id) {
            
                            $getall = $this->_db->query('SELECT * FROM membre WHERE idmembre IN (SELECT DISTINCT membre_idmembre FROM fonct_assoc_membre WHERE association_idassociation='.$id.');');
while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {
         //   print_r($donnees);

            $Object_tab[] = new Membre_object($donnees);
           
        }
               if(isset($Object_tab))  return  $Object_tab;


        }
        
        public function delete_membre_from_formation($idformation,$idmembre,$idgroupe)
        {
            $getall = $this->_db->prepare('DELETE FROM assiste WHERE membre_idmembre=? AND seance_idseance IN 
(SELECT idseance FROM seance WHERE groupe_idgroupe IN ( SELECT idgroupe from groupe WHERE formation_idformation=? AND idgroupe=?)) ');
                    $getall->execute(array($idmembre,$idformation,$idgroupe));
                    
        }
}

?>
