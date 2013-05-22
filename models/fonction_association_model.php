<?php
class Fonction_association_model extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }
    
    public  function add(Fonction_association_object $fonction_association) {
     //   print_r($fonction_association);
        $add = $this->_db->prepare('INSERT INTO fonction_ass(nomfonction_ass) values(:fonction)');
        $add->bindValue(':fonction', $fonction_association->get_nom_fonction());
        
    
        $add->execute();
               return $this->_db->lastInsertId();

       // print_r($add->errorinfo());
//print_r($add->errorinfo());
        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }
    
    

}
?>
