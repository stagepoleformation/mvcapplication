<?php

require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/membre_model.php';
require_once 'models/assoc_membre_fonction_model.php';

require_once 'models/association_model.php';
require_once 'libs/objects/membre_object.php';
require_once 'models/fonction_association_model.php';
require_once 'libs/objects/association_object.php';
require_once 'libs/objects/fonction_association_object.php';

class Membre extends Controller {

    function __construct() {
        parent::__construct();
        $this->view = new View();
    }

    public function add() {

        if (isset($_POST['submit'])) {
//verification de l'existance de la fonction danns la base
      $fonction=(new Fonction_association_model())->getAll("Fonction_association_object", "fonction_ass", "nomfonction_ass=\"".$_POST["fonction_association"]."\"");
     
      if(!isset($fonction[0])){
            $idfonction=(new Fonction_association_model())->add(new Fonction_association_object(array("nomfonction_ass"=>$_POST["fonction_association"],"idfonction_ass"=>"")));
            $idmembre=(new Membre_model())->add(new Membre_object(array(
                ""
                , $_POST["nom_membre"]
                , $_POST["ad_membre"]
                , $_POST["tel_membre"]
                , $_POST["email_membre"]
                , $_POST["cin_membre"]
                , $_POST["pnom_membre"]
                    ))) ;
            (new Assoc_membre_fonction_model())->add($idmembre, $_POST["association"], $idfonction, $_POST["date_debut_fonction"]);
            
        }
        else{
            $idmembree=(new Membre_model())->add(new Membre_object(array(
                ""
                , $_POST["nom_membre"]
                , $_POST["ad_membre"]
                , $_POST["tel_membre"]
                , $_POST["email_membre"]
                , $_POST["cin_membre"]
                , $_POST["pnom_membre"]
                    ))) ;
           $assoc_fonction= (new Assoc_membre_fonction_model())
                    ->getAll("Fonction_assoc_membre_object", "fonct_assoc_membre", "fonction_ass_idfonction_ass=\"".$fonction[0]->get_id_focntion()."\" AND association_idassociation=\" ".$_POST["association"]."\"");
            $nb=count($assoc_fonction)-1;
           if(isset($assoc_fonction[$nb]))
            {
                $assoc_fonction[$nb]->set_datefin(date("Y-m-d"));
                (new Assoc_membre_fonction_model())->update($assoc_fonction[$nb]->
                        get_idmembre(), $assoc_fonction[$nb]->get_idassociation(), $assoc_fonction[$nb]->get_idfonction(), $assoc_fonction[$nb]->get_datefin());
            (new Assoc_membre_fonction_model())->add($idmembree, $_POST["association"], $fonction[0]->get_id_focntion(), $_POST["date_debut_fonction"]);
                
                
            }
            else{
                (new Assoc_membre_fonction_model())->add($idmembree, $_POST["association"], $fonction[0]->get_id_focntion(), $_POST["date_debut_fonction"]);
                
                
            }
            
        }
        
        
        }

    
           
            
         
   
            
        
        
        
        
        
               $_POST["fonction"] =(new Fonction_association_model())->getAll("Fonction_association_object", "fonction_ass");

         $_POST["tab_of_association_name"]=(new Membre_model())->getAll("Association_object","association");
         
        $this->view->render("membre/add");
    }

    public function delete($ids) {

    
        $id = explode(",", $ids);
        foreach ($id as $value) {
            
        
         if(intval($value).''==$value){
          (new Membre_model())->delete("membre",$value,'idmembre');}
          else  {echo "Identifiant Non trouvé";}  
         }
        
         
         echo "<script>window.opener.location.reload();window.close();</script>";

    }

    public function modify($id='') {
        $id = explode(",", $id);
        
        if(isset($_POST["submit"])){
             $membre = new Membre_object(array(
                $_POST["id_membre"]
                , $_POST["nom_membre"]
                , $_POST["ad_membre"]
                , $_POST["tel_membre"]
                , $_POST["email_membre"]
                , $_POST["cin_membre"]
                , $_POST["pnom_membre"]
                    )
            );
        
            $id_membre=(new Membre_model())->update($membre);
           
            echo '<script>window.opener.location.reload();window.close();</script>';  
        }
        else{
        $_POST["submit"] = (new Membre_model())->getAll("Membre_object", 'membre','idmembre='.$id[0]);
        $this->view->render("membre/modify");}
    }

    public function look() {

        $tab_rows = (new Membre_model())->getAll("Membre_object", 'membre');
        if (isset($tab_rows)) {
            $_POST["noms_column"] = array("identifiant", "Nom", "Prenom", "e-mail", "Telephone", "CIN", "Adresse", "Photo", "CV", "Contrat");
           
            $_POST["donnees"] = $tab_rows;
           
            // $_POST["type"]="membre";
            // Utility::grid($tab_rows, array("identifiant", "Nom", "Prenom", "e-mail", "Téléphone", "CIN", "Adresse", "Photo", "CV", "Contrat"),"membre");}
            $this->view->render("membre/look");
        }
        
    }

    public function index() {
        
    }

    public function lookone($id_assoc,$id_membre) {
        
    $_POST["membre"] = (new Membre_model())->getAll("Membre_object", 'membre',"idmembre=".$id_membre);
        $_POST["fonctions"]=(new Fonction_association_model())->fonction_membre_in_assoc($id_membre,$id_assoc);
        $_POST["formation"]=(new Fonction_association_model())->get_formation_by_membre_id($id_membre);
//print_r($_POST["formation"]);
    $_POST["association"]=(new Association_model())->getAll("Association_object", 'association',"idassociation=".$id_assoc);

      $this->view->render("membre/lookone");
    }
    
    public function add_fonction()
    {
        if(isset($_POST["submit"]))
         {
             
             file_put_contents("c://wamp/www/mvc_test/libs/other/fonction_association.txt", "\n".$_POST["fonction"], FILE_APPEND );
            // $file=fopen("c://wamp/www/mvc_test/libs/other/fonction_association.txt","r+") or exit("Unable to open file!");
              //fwrite($file,$_POST["fonction"]."\n"); 
               //fclose($file);
             
         }
        
              $this->view->render("membre/add_fonction_membre_in_association");

    }
    
    
     public function delete_from_formation($idformation,$idmembre,$idgroupe)
    {
        (new Membre_model())->delete_membre_from_formation($idformation,$idmembre,$idgroupe);

    }

}
?>

