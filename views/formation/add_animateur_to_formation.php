<?php


echo "<ul>";
echo "<form method=\"post\"  action=\"/mvc_test/formation/add_animateur_to_formation\"  enctype=\"multipart/form-data\" > ";
foreach ($_POST["donnees"] as $value) {
    echo "<li>";
    echo "<input type=\"checkbox\" name=\"".$value->getId()."\" id=\"".$value->getId()."\" value=\"\" \">";  
    echo "<label for=\"".$value->getId()."\">[".$value->getId()."] ".$value->getNom()." ".$value->getPrenom()."</label>"; 
    
    echo "</li>";
}

echo "<input type=\"submit\"  value=\"Submit\" name=\"submit\"  /> ";
echo "<input type=\"submit\"  value=\"Fermer\" name=\"submit\" onclick=\"close_reload();\" /> ";

    echo "</ul>";
    echo "</form>";
?>
</section>
</body>
</html>

<script>
    document.getElementById("fofo").parentNode.removeChild(document.getElementById("fofo"));

    var hidden = document.createElement('input');

    hidden.setAttribute('type', 'hidden');
     hidden.setAttribute('value',window.opener.document.getElementsByTagName("li")[14].getAttribute("value"));

 hidden.setAttribute('name','id_formation');



    document.getElementsByTagName("form")[0].appendChild(hidden);
    function close_reload()
    {
           window.opener.location.reload();   
       self.close();

        
    }

                        
</script>