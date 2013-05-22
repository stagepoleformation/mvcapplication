
<?php
echo "<article class=\"seance\"  hidden  >";
            
        
foreach ($_POST["result"] as $value) {
    echo "<p  >".$value->get_id()."</p>";
    echo "<p  id=\"".$value->get_id()."\" >".$value->get_nom()."</p>";
            echo "<p>".$value->get_datedebut()."</p>";
            echo "<p>".$value->get_datefin()."</p>";
    
}

            
                echo "</article>";
            ?>