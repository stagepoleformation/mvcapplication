<?php

require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/animateur_model.php';
require_once 'libs/objects/animateur_object.php';
require_once 'libs/objects/fonction_assoc_membre_object.php';
require_once 'libs/objects/groupe_object.php';

class Model {

    public $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

    public function getAll($object_type, $table_name, $where = "1") {


        //retourne la liste de tous les Object(animateur, association, formation ...) de la base de données

        $getall = $this->_db->query('SELECT * FROM ' . $table_name . ' WHERE ' . $where . ';');

        //   print_r($where);

        while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {

            // print_r($donnees);
            $Object_tab[] = new $object_type($donnees);
        }

        if (isset($Object_tab))
            return $Object_tab;
    }

    public function getcolomn($table_name, $colomn_name, $where = "1=1") {

        //retourne la liste de tous les Object(animateur, association, formation ...) de la base de données
        $tab[] = array();

        $getall = $this->_db->query("SELECT " . $colomn_name . " FROM " . $table_name . " WHERE  " . $where . " ;");
        //  print_r($this->_db->errorinfo()); 

        while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {
            print_r($donnees);
            $tab[] = $donnees;
        }

        if (isset($tab))
            return $tab;
    }

    public static function get_culomns_name($table_name) {
        $db_access = new PDO('mysql:host=localhost;dbname=pole', 'root', '');
        $get_decription = $db_access->query('DESCRIBE ' . $table_name . ';');
        while ($donnees = $get_decription->fetch(PDO::FETCH_BOTH)) {

            $get_columns_name[] = $donnees[0];
        }
        return $get_columns_name;
    }

    public function delete($table_name, $id, $colomn_name) {

        $db_access = new PDO('mysql:host=localhost;dbname=pole', 'root', '');
        $nb = $db_access->exec('DELETE FROM ' . $table_name . ' WHERE ' . $colomn_name . '=' . $id . ';');

        echo print_r($db_access->errorInfo());
    }

    public function liste_membres_present_d_formationx($id_assiciation, $id_formation) {

      //  print_r($id_formation);
        $getall = $this->_db->prepare('SELECT DISTINCT idmembre,nmembre,pnmembre,idgroupe,ngroupe FROM membre join groupe on idgroupe 
             IN ( SELECT distinct ss.groupe_idgroupe FROM seance as ss WHERE exists 
              ( SELECT * FROM assiste WHERE seance_idseance=ss.idseance AND idmembre=membre_idmembre)  ) WHERE formation_idformation=? AND idmembre 
               IN (SELECT membre_idmembre FROM fonct_assoc_membre WHERE association_idassociation=? ) ORDER by idgroupe;');

     
        $getall->execute(array($id_formation,$id_assiciation));
      // print_r($this->_db->errorinfo());
        //print_r($getall);

                return $getall->fetchAll();
       
    }
    
    public function fonction_membre_in_assoc($idmembre,$idassociation)
    {
        
        $getall = $this->_db->prepare('SELECT idfonction_ass,nomfonction_ass,ddebut_fonction,dfin_fonction
 FROM fonction_ass JOIN fonct_assoc_membre ON idfonction_ass=fonction_ass_idfonction_ass WHERE membre_idmembre=? AND association_idassociation=?');

     
        $getall->execute(array($idmembre,$idassociation));
        return $getall->fetchAll();
    }
    
    public function  get_formation_by_membre_id($idmembre)
    {
        $getall = $this->_db->prepare('SELECT idformation,intiformation,dformation,fformation,tformation FROM formation 
WHERE EXISTS (SELECT idgroupe FROM groupe WHERE formation_idformation=idformation
 AND EXISTS(SELECT idseance FROM seance WHERE groupe_idgroupe=idgroupe AND
 EXISTS(SELECT membre_idmembre FROM assiste WHERE seance_idseance=idseance AND bolassist=1 AND membre_idmembre=? )))');

     
        $getall->execute(array($idmembre));
        return $getall->fetchAll();
        
    }

}

?>
