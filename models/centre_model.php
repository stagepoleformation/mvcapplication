<?php

class Centre_model extends Model {

    
    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', '111111'));
    }

     public  function add(Centre_object $centre) {
       //  print_r($centre);
        $add = $this->_db->prepare('INSERT INTO centre(ncentre,adcentre,rcentre,tcentre) values(:nom,:adresse,:region,:type)');
        $add->bindValue(':nom', $centre->get_nom());
        $add->bindValue(':adresse', $centre->get_adresse());
        $add->bindValue(':region', $centre->get_region());
        $add->bindValue(':type', $centre->get_type());
    
        $add->execute();
        print_r($add->errorinfo());
//print_r($add->errorinfo());
        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }

}
?>
