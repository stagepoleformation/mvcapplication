<?php

require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/animateur_model.php';
require_once 'models/anime_formation_model.php';
require_once 'libs/objects/animateur_object.php';

class Animateur extends Controller {

    function __construct() {
        parent::__construct();
        $this->view = new View();
    }

    public function add() {



        if (isset($_POST['submit'])) {
            $cv = Utility::upload("cv_animateur", "libs/uploads/animateur/cv/", FALSE, array('pdf', 'doc', 'docx'));
            $picture = Utility::upload("photo_animateur", "libs/uploads/animateur/picture/", FALSE, array('png', 'gif', 'jpg', 'jpeg'));
            $contrat = Utility::upload("contrat_animateur", "libs/uploads/animateur/contrat/", FALSE, array('pdf', 'doc', 'docx'));
            $anim = new Animateur_object(array(
                ""
                , $_POST["nom_animateur"]
                , $_POST["pnom_animateur"]
                , $_POST["ad_animateur"]
                , $_POST["tel_animateur"]
                , $_POST["email_animateur"]
                , $_POST["cin_animateur"]
                , $picture[1]
                , $cv[1]
                , $contrat[1]
                    )
            );
         
            (new Animateur_model())->add($anim);
        }
        $this->view->render("animateur/add");
    }

    public function delete( $ids) {
        $id = explode(",", $ids);
        foreach ($id as $value) {
            
        
         if(intval($value).''==$value){
          (new Animateur_model())->delete("animateur",intval($value),'idanimateur');}
          else  {echo "Identifiant Non trouvé";}  
         }
         echo "<script>window.opener.location.href = window.opener.location.href;;window.close();<script>";

    }

    public function modify($ids="") {
        
           if (isset($_POST['submit'])) {
               
                $anim = new Animateur_object(array(
                  $_POST["id_animateur"]
                , $_POST["nom_animateur"]
                , $_POST["pnom_animateur"]
                , $_POST["ad_animateur"]
                , $_POST["tel_animateur"]
                , $_POST["email_animateur"]
                , $_POST["cin_animateur"]
                , ""
                , ""
                , ""
                    )
            );
               
                        (new Animateur_model())->update($anim);
   
           }
else {
                $id = explode(",", $ids);
                $where="idanimateur=";
                 $where.=$id[0];
                
                
        $_POST["result"]=(new Animateur_model())->getAll("Animateur_object", "animateur",$where);
}
        
                        $this->view->render("animateur/modify");

        
    }

    public function look() {

        $tab_rows = (new Animateur_model())->getAll("Animateur_object", 'animateur');
        if (isset($tab_rows)) {
            $_POST["noms_column"] = array("identifiant", "Nom", "Prenom", "e-mail", "Telephone", "CIN", "Adresse", "Photo", "CV", "Contrat");
           
            $_POST["donnees"] = $tab_rows;
           
            // $_POST["type"]="animateur";
            // Utility::grid($tab_rows, array("identifiant", "Nom", "Prenom", "e-mail", "Téléphone", "CIN", "Adresse", "Photo", "CV", "Contrat"),"animateur");}
            $this->view->render("animateur/look");
        }
        
    }

    public function index() {
        
    }

    public function lookone($id) {
        
        if( isset($id) and intval($id)==$id){
         $_POST["animateur"]=(new Animateur_model())->getAll("Animateur_object","animateur","idanimateur=".$id);
        
       // print_r($_POST["animateur"][0]->getId());
        
         $_POST["formation_animer"] = (new Anime_formation_model())->get_formation_animateur($id);
         }
      $this->view->render("animateur/lookone");
    }
    
    
   

}
?>

