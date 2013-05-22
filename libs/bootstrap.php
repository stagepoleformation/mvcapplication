<?php

class Bootstrap {

    function __construct() {

        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');

            $url = explode('/', $url);
            //print_r($url);


            if (file_exists($file = 'controllers/' . $url[0] . '.php')) {
                require_once $file;

                $controllers = new $url[0];
                if (isset($url[5]) AND method_exists($controllers, $url[1]))
                    $controllers->{$url[1]}($url[2],$url[3],$url[4],$url[5]);
                 elseif (isset($url[4]) AND method_exists($controllers, $url[1]))
                    $controllers->{$url[1]}($url[2],$url[3],$url[4]);
                elseif (isset($url[3]) AND method_exists($controllers, $url[1]))
                    $controllers->{$url[1]}($url[2],$url[3]);
                elseif (isset($url[2]) AND method_exists($controllers, $url[1]))
                    $controllers->{$url[1]}($url[2]);
                elseif (isset($url[1]) AND method_exists($controllers, $url[1]))
                    $controllers->{$url[1]}();
                elseif (isset($url[1]) AND !method_exists($controllers, $url[1]))
                    echo 'methode  non trouve ';
            }
            else{
                require_once 'controllers/index.php';
            $controllers = new index();
            echo 'chemin /'.$url[0]. ' non existant';}
        }
         else {
            require_once 'controllers/index.php';
            $controllers = new index();
        }
    }

}



?>
