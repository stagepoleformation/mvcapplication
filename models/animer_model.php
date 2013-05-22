<?php

class Animer extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', '111111'));
    }

    public function get_formation($id_animateur) {

        $getall = $this->_db->query('SELECT ' . $colomn_name . ' FROM ' . $table_name . 'WHERE ' . $where . ';');
    }

   

}

?>
