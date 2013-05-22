<?php

class Groupe_model extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }
    
     public  function add(Groupe_object $groupe) {
       //  print_r($membre);
        $add = $this->_db->prepare('INSERT INTO groupe(ngroupe,formation_idformation,pcgroupe) values(:nom,:id_formation,:pcgroupe)');

        $add->bindValue(':nom', $groupe->getNom());
        $add->bindValue(':id_formation', $groupe->getIdFormation());
        $add->bindValue(':pcgroupe', $groupe->getPublic());
   
        $add->execute();
       //print_r($add->errorinfo());
       return $this->_db->lastInsertId();
       
       
        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }

}
?>
