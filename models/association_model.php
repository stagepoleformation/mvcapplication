<?php

class Association_model extends Model {

   function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }
    
    public  function add(Association_object $association) {
        $add = $this->_db->prepare('INSERT INTO association(nassociation,adassociation,telassociation,	
faxeassociation,mailassociaiton,prassociation,rassociation,secactivite) values(:nom,:adresse,:tel,:fax,:email,:president,:region,:secteur)');

        $add->bindValue(':nom', $association->get_nom());
        $add->bindValue(':adresse', $association->get_adresse());
        $add->bindValue(':email', $association->get_email());
        $add->bindValue(':tel', $association->get_telephone());
        $add->bindValue(':fax', $association->get_faxe());
        $add->bindValue(':president', $association->get_president());
        $add->bindValue(':region', $association->get_region());
        $add->bindValue(':secteur', $association->get_secteur());
        $add->execute();

        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }
    
        public function update(Association_object $assoc) {

        $inserto = $this->_db->prepare('UPDATE  association SET nassociation=:nom,adassociation=:adresse,telassociation=:tel,faxeassociation=:faxe,
        mailassociation=:mail,prassociation=:president,rassociation=:region,secactivite=:secteur WHERE idassociation=' . $assoc->get_id() . ';');
print_r($inserto);


        $inserto->bindValue(':nom', $assoc->get_nom());
        $inserto->bindValue(':adresse', $assoc->get_adresse());
        $inserto->bindValue(':tel', $assoc->get_telephone());
        $inserto->bindValue(':faxe', $assoc->get_faxe());
        $inserto->bindValue(':mail', $assoc->get_email());
        $inserto->bindValue(':president', $assoc->get_president());
        $inserto->bindValue(':region', $assoc->get_region());
        $inserto->bindValue(':secteur', $assoc->get_secteur());

        $inserto->execute();
    }

    
    

}
?>
