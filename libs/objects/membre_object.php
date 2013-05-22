<?php

class Membre_object extends Object {

    private $_id;
    private $_nom;
    private $_prenom;
    private $_email;
    private $_telephone;
    private $_cin;
    private $_adresse;
 

    public function __construct(array $entrees) {
        
        
        $this->hydrate($entrees);
    }

//getter
    public function getId() {
        return $this->_id;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getTelephone() {
        return $this->_telephone;
    }

    public function getCin() {
        return $this->_cin;
    }

   

    public function getAdresse() {
        return $this->_adresse;
    }

    public function getPrenom() {
        return $this->_prenom;
    }

    

//setter
    public function setId($id) { // l'id doit être un entier
        $this->_id = (int) $id;
    }

    public function setNom($nom) {
// on véréfie que la variable $nom est de type string et qu'elle est de longueur inférieur ou égale  a 40
//(la longueur de la colonne nom dans la base de données)
        if (is_string($nom) && strlen($nom) < 41) {
            $this->_nom = $nom;
        }
    }

    public function setPrenom($prenom) {
        if (is_string($prenom) && strlen($prenom) < 51) {
            $this->_prenom = $prenom;
        }
    }

    public function setEmail($email) {
// on véréfie que la variable $email est de type string et qu'elle est de longueur inférieur ou égale a 50
//(la longueur de la colonne email dans la base de données)
        if (is_string($email) && strlen($email) < 51) {
            $this->_email = $email;
        }
    }

    public function setTelephone($telephone) {
// on véréfie que la variable $email est de type string et qu'elle est de longueur inférieur ou égale a 20
//(la longueur de la colonne telephone dans la base de données)
        if (is_string($telephone) && strlen($telephone) < 21) {
            $this->_telephone = $telephone;
        }
    }

    public function setCin($cin) {
// on véréfie que la variable $cin est de type string et qu'elle est de longueur inférieur ou égale a 10
//(la longueur de la colonne cin dans la base de données)
        if (is_string($cin) && strlen($cin) < 11) {
            $this->_cin = $cin;
        }
    }

  

    public function setAdresse($adresse) {
        if (is_string($adresse) && strlen($adresse) < 101) {
            $this->_adresse = $adresse;
        }
    }

    public function hydrate(array $entrees) {
//cette methode va copie chaque champ du tableau associatif entrees dans le champ corespondant de la classe animateur
// la fonction ucfirst() retourne la chaine $key mais avec la premier lettre en majiscule comme ça en respecte le nom des méthodes setter	
        
        $i = 0;
        $tab_attributs = array('Id', 'Nom', 'Adresse', 'Telephone', 'Email', 'Cin', 'Prenom');
        foreach ($entrees as $value) {
            $method = 'set' . $tab_attributs[$i++];
            $this->$method($value);
        }
    }

    public function  get_getter(){
        static $j=0;
        $tab_attributs = array('Id', 'Nom', 'Prenom', 'Email', 'Telephone', 'Cin', 'Adresse');
        if($j<7){
        $getter='get'.$tab_attributs[$j++];
        return $this->$getter();}
        else $j=0;return $this->get_getter();
    }


}
?>
