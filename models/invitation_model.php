<?php

class Invitation_model extends Model {

    function __construct() {
         parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }

    
    public function inviter($idformation,$idassociation)
    {
         $add = $this->_db->prepare('INSERT INTO invitation(formation_idformation,association_idassociation,boolreponse) values(?,?,2);');
        $add->execute(array($idformation,$idassociation));
    }
    
    
}
?>
