<?php
//print_r($_POST["association"]);
$valuee="";
        
foreach ($_POST["association"] as $value) {
   // print_r($value);
  $valuee.=$value[0]->get_email()." ";
    
}
//print_r($valuee);
echo "<div id=\"ok\">";
echo "<textarea    rows=\"5\" cols=\"50\">".$valuee."</textarea><br/>";
echo  "<h4 >Plan d'accès</h4>";
echo "<textarea    rows=\"5\" cols=\"50\">http://maps.google.com.au/maps?ll=".str_replace(" ","",rtrim(trim($_POST["formation"][0]->getPlan(), "("),")"))."</textarea>";
echo "</div>";

?>
