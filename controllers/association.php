<?php
require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/association_model.php';
require_once 'models/groupe_model.php';
require_once 'models/formation_model.php';
require_once 'models/seance_model.php';
require_once 'models/membre_model.php';
require_once 'models/invitation_model.php';
require_once 'models/Assoc_membre_fonction_model.php';
require_once 'models/assiste_model.php';


require_once 'libs/objects/association_object.php';
require_once 'libs/objects/groupe_object.php';
require_once 'libs/objects/invitation_object.php';
require_once 'libs/objects/seance_object.php';
require_once 'libs/objects/formation_object.php';
require_once 'libs/objects/assiste_object.php';


class Association extends Controller {

    function __construct() {
          parent::__construct();
        $this->view = new View();
        
    }
    
    public function etat($idformation,$idassoc)
    {
        echo "<input id=\"idformation\" type=\"hidden\" value=\"".$idformation."\" />";
                echo "<input id=\"idassoc\" type=\"hidden\" value=\"".$idassoc."\" />";

                 $this->view->render("association/etat");

    }
    public function add_secteur()
    {
          if(isset($_POST["submit"]))
         {
             //echo "ok";
             file_put_contents("c://wamp/www/mvc_test/libs/other/secteur_association.txt", "\n".$_POST["secteur_association"], FILE_APPEND );
            // $file=fopen("c://wamp/www/mvc_test/libs/other/fonction_association.txt","r+") or exit("Unable to open file!");
              //fwrite($file,$_POST["fonction"]."\n"); 
               //fclose($file);
             
         }
         $this->view->render("association/add_secteur_association");
        
        
        
    }
    
    
public function add()
{
    
    if (isset($_POST['submit'])) {
        
           
            $association = new Association_object(array(
                ""
                , $_POST["nom_association"]
                , $_POST["ad_association"]
                , $_POST["tel_association"]
                , $_POST["fax_association"]
                ,  $_POST["email_association"]
                , $_POST["president_association"]
                , $_POST["region_association"]
                    ,$_POST["secteur_association"]
            ));
       //  print_r($association);
            (new association_model())->add($association);
        }
    
    $this->view->render("association/add");  
}

public function look()
{
    
       $tab_rows = (new association_model())->getAll("association_object", 'association');

        if (isset($tab_rows)) {
            $_POST["noms_column"] = array("Identifiant", "Nom", "Adresse", "Télephone","Fax","Email", "Président", "Region","secteur");
            $_POST["donnees"] = $tab_rows;
           //print_r($tab_rows);
            // $_POST["type"]="animateur";
            // Utility::grid($tab_rows, array("identifiant", "Nom", "Prenom", "e-mail", "Téléphone", "CIN", "Adresse", "Photo", "CV", "Contrat"),"animateur");}
            $this->view->render("association/look");
        }    
}

public function lookone($id)
{
    
    if( isset($id) and intval($id)==$id)
    {
     $_POST["association"]=(new Association_model())->getAll("Association_object","association","idassociation=".$id);
          $temp=(new Membre_model())->get_membre_of_association($id);
       //   print_r($temp);
          
       //print_r($temp);
          $_POST["noms_column"]=array("Identifiant","Nom","Prenom","Fonction","Période");
          $membre=array();
          if(isset($temp)){
          foreach ($temp as $value) {
              $mem=array();
              $mem["idmembre"]=$value->getId();
              $mem["nommembre"]=$value->getNom();
              $mem["prenommembre"]=$value->getPrenom();
              $fonc=(new Assoc_membre_fonction_model())->
                  get_idfonction_nomfonction($value->getId(), $id);
              $periode=(new Assoc_membre_fonction_model())->getAll("Fonction_assoc_membre_object",
                      "fonct_assoc_membre", "association_idassociation=".$id." AND membre_idmembre=".$value->getId()." AND fonction_ass_idfonction_ass=".$fonc[0]->get_id_focntion());
              
              $mem["idfonction"]=$fonc[0]->get_id_focntion();
              $mem["nomfonction"]=$fonc[0]->get_nom_fonction();
              $mem["datedebut"]=$periode[0]->get_datedebut();
              $mem["datefin"]=$periode[0]->get_datefin();
          
              $membre[]=$mem;
              
          }
    $_POST["membre"]=$membre;}
       //print_r($_POST["membre"]);
         // print_r($_POST["membre"]);
          $_POST["formation_assiste"]=(new Invitation_model())->getAll("Invitation_object", "invitation","association_idassociation=".$id);
          $formationarray=array();
          if(isset($_POST["formation_assiste"])){
          foreach ($_POST["formation_assiste"] as $key => $value) {
            $formationarray[$key]= (new Formation_model())->getAll("Formation_object","formation","idformation=".$value->get_formationid());
          }
          $_POST["formations"]=$formationarray;}
         //print_r($formation_assiste);
    }
    
    
    $this->view->render("association/lookone");
}

public function agenda()
        
{
    
    $this->view->render("association/agenda");
}

public function add_animateur_to_association()      
{
    $tab_rows = (new Animateur_model())->getAll("Animateur_object", 'animateur');
    //print_r($tab_rows);
    if(isset($tab_rows)){
        $_POST["donnees"]=$tab_rows;
    $this->view->render("association/add_animateur_to_association");
    }
}

 public function delete($id) {
    $id = explode(",", $id);

    
       foreach ($id as $value) {
                  if(intval($value).''==$value and $value!=""){
          (new association_model())->delete("association",$value,'idassociation');}
          else  {echo "Identifiant Non trouvé";}  
         
         

 }
 
 $this->look();
          }
    
    
       public function modify($ids="") {
        
           if (isset($_POST['submit'])) {
               
                $assoc = new Association_object(array(
                $_POST["id_association"]
                , $_POST["nom_association"]
                , $_POST["ad_association"]
                , $_POST["tel_association"]
                , $_POST["fax_association"]
                , $_POST["email_association"]
                , $_POST["president_association"]
                , $_POST["region_association"]
                , $_POST["secteur_association"]
            ));
               
                        (new Association_model())->update($assoc);
   
           }
else {
                $id = explode(",", $ids);
                $where="idassociation=";
                 $where.=$id[0];
                
                
        $_POST["result"]=(new Association_model())->getAll("Association_object", "association",$where);
        $this->view->render("association/modify");
}
        
                        

        
    }
    
    public function add_membre_to_formation($membres,$groupe,$association,$formation)
    {
        $membres=explode(",",$membres);
        $seances=(new Seance_model())->getAll("Seance_object", "seance", "groupe_idgroupe=".$groupe);
        
        foreach ($membres as $valuee) {
            
        if($valuee!=""){
            if(isset($seances)){
        foreach ($seances as $value) {
            (new Assiste_model())->add(new Assiste_object(array("membre_idmembre"=>$valuee,"seance_idseance"=>$value->get_id(),"bolassist"=>2)));
            
        }}
        else {echo "pas de seances trouvé";}
        }}
            echo "<script>document.getElementById(\"fofo\").parentNode.removeChild(document.getElementById(\"fofo\"))</script>";

                               echo "<script> window.open(\"/mvc_test/association/liste_membres_present_d_formationx/".$association."/".$formation."\", \"windows\", 'width=800,height=500');</script>";

    }
    
    
    
    
   public function liste_membres_present_d_formationx($id_association,$id_formation)
   {
   
       $_POST["view"]=(new Association_Model())->liste_membres_present_d_formationx($id_association,$id_formation);
    // print_r( $_POST["view"]);
        $tab_rows = (new Membre_model())->get_membre_of_association($id_association);
        $tab_rows2 = (new Groupe_model())->getAll("Groupe_object","groupe","formation_idformation=".$id_formation );
   // print_r($tab_rows);
    if(isset($tab_rows)){
        $_POST["membres"]=$tab_rows;
       // print_r($_POST["membres"]);
    
    }
    if(isset($tab_rows2)){
        $seances=array();
        foreach ($tab_rows2 as $value) {
             $seances[$value->getId()] = (new Seance_model())->getAll("Seance_object","seance","groupe_idgroupe=".$value->getId() );
        }
       
        $_POST["groupes"]=$tab_rows2;
        if(isset($seances)) $_POST["seances"]=$seances;
        
        
      //   print_r($_POST["groupes"]);
    }
    $_POST["idassociation"]=$id_association;
    $_POST["idformation"]=$id_formation;
        $this->view->render("association/liste_membres_present_d_formationx");

    
     if(isset($_POST["submit"])){
         foreach ($_POST as $key => $value) {
             if ($key!= "submit" && $key!= "donnees" && $key!="id_formation" ){
                   

                $add=(new Assiste_model())->add(new Anime_formation_object(intval($_POST["id_formation"]),intval($key)));
                 
             } 
                            

             
         }

     }
    

       
   }
   
   public function inviter($ids='',$form=''){
       if($ids!=''){
       echo "<script>document.getElementById(\"fofo\").parentNode.removeChild(document.getElementById(\"fofo\"));</script>";
              $_POST["formation"] = (new Formation_model())->getAll("Formation_object", 'formation');
              $_POST["ids"]=$ids;
              if($form!='')
              {
                  
                   $id = explode(",", $ids);
                   foreach ($id as $value) {
                       if(intval($value)==$value and $value!=""){
                           
                           (new Invitation_model())->inviter($form, $value);
                       }
                   }
                   
                  
       }}
       else{       echo "<script>document.getElementById(\"fofo\").parentNode.removeChild(document.getElementById(\"fofo\"));</script>";
      echo "pas d'association selectionner";}
$this->view->render("association/inviter");
       
   }
   
   public function mailing($idassoc,$idformation)
   {
       
       $_POST["formation"]=(new Formation_model())->getAll("Formation_object","formation","idformation=".$idformation);
      $idassoc = explode(",", $idassoc);
      $tab =array();
                   foreach ($idassoc as $value) {
                       //print_r($value);
                       if($value!=""){
     $_POST["association"][]=(new Association_model())->getAll("Association_object","association","idassociation=".$value);
                       }
                   
                   }
                                      $this->view->render("association/mailing");

                //   print_r($_POST["association"]);
   }
  

}
?>
