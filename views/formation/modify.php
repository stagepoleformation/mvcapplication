<article>
    <form  method="post"  action="/mvc_test/formation/modify"  enctype="multipart/form-data"> 
        <fieldset>
  <legend><h1>Modifier</h1></legend>
        

           <?php 
           echo "<p>";
           foreach ($_POST["result"] as $key => $value) {
                echo "<input type=\"hidden\" name=\"id_formation\" value=\"".$value->getId()."\" id=\"id_formation\" placeholder=\"id de l'Animateur\"  /><br/>";
               echo "<label for=\"intitule_formation\" >Intitule : </label><input type=\"text\" name=\"intitule_formation\" value=\"".$value->getIntitule()."\" id=\"intitule_formation\" placeholder=\"Nom de l'Animateur\"  /><br/>";
            echo "<label for=\"date_debut__formation\" >Date debut : </label><input type=\"date\" name=\"date_debut__formation\" value=\"".$value->getDate_d()."\" id=\"date_debut__formation\" placeholder=\"Prenom de l'Animateur\"  /><br/>";
           echo  "<label for=\"date_fin_formation\" >Date fin : </label><input type=\"date\" name=\"date_fin_formation\" value=\"".$value->getDate_f()."\" id=\"date_fin_formation\" placeholder=\"Telephone de l'Animateur\"  /><br/>";
         echo   "<label for=\"lieu_formation\" >Lieu : </label><input type=\"text\" name=\"lieu_formation\" value=\"".$value->getEmplacement()."\" id=\"lieu_formation\" placeholder=\"Adresse de l'Animateur\"  /><br/>";

         echo   "<label for=\"adresse_lieu_formation\" >Adresse : </label><input type=\"adresse_lieu\" name=\"adresse_lieu_formation\" value=\"".$value->getAdrsempl()."\" id=\"adresse_lieu_formation\" placeholder=\"E-mail de l'Animateur\"  /><br/>";
          echo  "<label for=\"type_formation\" >Type : </label><input type=\"text\" name=\"type_formation\" value=\"".$value->getType()."\" id=\"type_formation\" placeholder=\"CIN de l'Animateur\"  /><br/>";
         
      echo "<input type=\"submit\" value=\"Submit\" name=\"submit\" onclick=\"ok();\" /><br/>";
}
           echo "</p>";
           ?>
           
        

 </fieldset>
    </form>
</article>

  </section>
           </body>
</html>

<script>
    
    function ok(){
self.close();

}
</script>

<script>
    function maps(){
 
 var ok=window.open("/maps_api/","windows",'width=800,height=500' );

       
 
          
    }
    function okok(position)
    {
    document.getElementById("maps").parentNode.removeChild(document.getElementById("maps"));
    var taga=document.getElementById("position");
    taga.type="text";
    taga.value=position;
    
  
    
    }
$('#fofo').remove();


</script>