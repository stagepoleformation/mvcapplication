<?php

class Index extends Controller {

    function __construct() {
         parent::__construct();
          $this->view=new View();
           $this->view->render("index/index");
    }
    
   

}

?>
