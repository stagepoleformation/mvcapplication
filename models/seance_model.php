<?php
class Seance_model extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }

    
    public  function add(Seance_object $seance) {
       //  print_r($membre);
        $add = $this->_db->prepare('INSERT INTO seance(nseance,groupe_idgroupe,ddseance,dfseance) values(:nom,:id_groupe,:dseance,:fseance)');

        $add->bindValue(':nom', $seance->get_nom());
        $add->bindValue(':id_groupe', $seance->get_groupeid());
        $add->bindValue(':dseance', $seance->get_datedebut());
        $add->bindValue(':fseance', $seance->get_datefin());
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
