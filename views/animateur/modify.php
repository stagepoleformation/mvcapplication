<article>
    <form  method="post"  action="/mvc_test/animateur/modify"  enctype="multipart/form-data"> 
        <fieldset>
  <legend><h1>Modifier</h1></legend>
        

           <?php 
           echo "<p>";
           foreach ($_POST["result"] as $key => $value) {
                echo "<input type=\"hidden\" name=\"id_animateur\" value=\"".$value->getId()."\" id=\"id_animateur\" placeholder=\"id de l'Animateur\"  /><br/>";
               echo "<label for=\"nom_animateur\" >Nom : </label><input type=\"text\" name=\"nom_animateur\" value=\"".$value->getNom()."\" id=\"nom_animateur\" placeholder=\"Nom de l'Animateur\"  /><br/>";
            echo "<label for=\"pnom_animateur\" >Prenom : </label><input type=\"text\" name=\"pnom_animateur\" value=\"".$value->getPrenom()."\" id=\"pnom_animateur\" placeholder=\"Prenom de l'Animateur\"  /><br/>";
           echo  "<label for=\"tel_animateur\" >Telephone : </label><input type=\"text\" name=\"tel_animateur\" value=\"".$value->getTelephone()."\" id=\"tel_animateur\" placeholder=\"Telephone de l'Animateur\"  /><br/>";
         echo   "<label for=\"ad_animateur\" >Adresse : </label><input type=\"text\" name=\"ad_animateur\" value=\"".$value->getAdresse()."\" id=\"ad_animateur\" placeholder=\"Adresse de l'Animateur\"  /><br/>";

         echo   "<label for=\"email_animateur\" >E-mail : </label><input type=\"email\" name=\"email_animateur\" value=\"".$value->getEmail()."\" id=\"email_animateur\" placeholder=\"E-mail de l'Animateur\"  /><br/>";
          echo  "<label for=\"cin_animateur\" >CIN : </label><input type=\"text\" name=\"cin_animateur\" value=\"".$value->getCin()."\" id=\"cin_animateur\" placeholder=\"CIN de l'Animateur\"  /><br/>";

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