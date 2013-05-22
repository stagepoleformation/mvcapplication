<?php

class View {

    function __construct() {
         require_once 'libs/staticview.php';
    }
    
    public function render($view_name)
    {
         require_once 'views/'. $view_name .".php";
    
    }
}
?>
