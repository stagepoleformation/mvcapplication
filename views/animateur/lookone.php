
<script type="text/javascript">
 $('head').append(' <link rel="stylesheet" href="/mvc_test/libs/css/animateur.css" />');


</script>







<div id="cv" class="instaFade">
    <div class="mainDetails">
        <div id="headshot" class="quickFade">
            <img src=<?php echo "/mvc_test/libs/uploads/animateur/picture/" . $_POST["animateur"][0]->getPhoto() ?> alt=<?php echo $_POST["animateur"][0]->getNom() . " " . $_POST["animateur"][0]->getPrenom() ?> />
        </div>

        <div id="name">
            <h1 class="quickFade delayTwo"><?php echo $_POST["animateur"][0]->getNom() . " " . $_POST["animateur"][0]->getPrenom() ?></h1>
            <h2 class="quickFade delayThree">Animateur</h2>
        </div>

        <div id="contactDetails" class="quickFade delayFour">
            <ul>
                <li>Identifiant: <?php echo $_POST["animateur"][0]->getId() ?></li>
                <li>E-mail: <?php echo $_POST["animateur"][0]->getEmail() ?></li>
                <li>Cin: <?php echo  $_POST["animateur"][0]->getCin() ?></li>
                <li>Adresse: <?php echo $_POST["animateur"][0]->getAdresse() ?></li>
                <li>Tel: <?php echo $_POST["animateur"][0]->getTelephone() ?></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>

    <div id="mainArea" class="quickFade delayFive">

        <section>
            <div class="sectionTitle">
                <h1>Formations Animer</h1>
            </div>

            <div class="sectionContent">
                
              <?php
              
                if(isset($_POST["formation_animer"])){                 
              foreach ($_POST["formation_animer"] as $value) {
                  
              
                echo "<article>";
                 echo   "<h2><a href=\"\mvc_test/formation/lookone/".$value->getId()."\" >".$value->getIntitule()."</a></h2>";
                 echo   "<p class=\"subDetails\">".$value->getDate_d(). "  -  " .$value->getDate_f(). "</p>";
                 echo   "<p class=\"subDetails\"> Type: ".$value->getType(). "</p>";
                echo    "<p>".$value->getEmplacement(). "</p>";
                echo "</article>";
                 }
                }
                else echo "aucune formation"
              ?>

               
            </div>
            <div class="clear"></div>
        </section>





    </div>
</div>

</body>
</html>

