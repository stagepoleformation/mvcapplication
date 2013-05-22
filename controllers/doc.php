<?php

class Doc {

    function __construct() {
        
    }
    
    public function view($object,$type,$doc=FALSE)
    {
        echo "ok" .$object.$type.$doc ;
        //require_once 'mvc_test/libs/uploads/'.$object."/".$type."/1.php";
        
    }

}
?>
