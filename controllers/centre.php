<?php
require_once 'libs/objects/centre_object.php';
require_once 'libs/Model.php';
require_once 'models/centre_model.php';
class Centre extends Controller {

    function __construct() {
          parent::__construct();
        $this->view = new View();
    }
    
    public function add() {



        if (isset($_POST['submit'])) {
            $anim = new Centre_object(
                ""
                , $_POST["nom_centre"]
                , $_POST["ad_centre"]
                , $_POST["region_centre"]
                , $_POST["type_centre"]
                    )
            ;
         
            (new Centre_model())->add($anim);
        }
        $this->view->render("centre/add");
    }

}
?>
