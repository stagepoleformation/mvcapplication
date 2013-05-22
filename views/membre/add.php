<br/><br/>


    <article>
         <fieldset>
  <legend><h1>Ajout d'un membre Dans la base de données</h1></legend>
    <form  method="post"  action="/mvc_test/membre/add"  enctype="multipart/form-data"> 
       
    <table>

         <tr>   <td align="left"> <label for="nom_membre" >Nom : </label></td> <td align="left"><input type="text" name="nom_membre" id="nom_membre" placeholder="Nom du membre"  /></td></tr>
    <tr>       <td align="left">   <label for="pnom_membre" >Prenom : </label></td> <td align="left"><input type="text" name="pnom_membre" id="pnom_membre" placeholder="Prenom du membre"  /></td></tr>
        <tr>     <td align="left"> <label for="tel_membre" >Telephone : </label></td> <td align="left"><input type="text" name="tel_membre" id="tel_membre" placeholder="Telephone du membre"  /></td></tr>
        <tr>     <td align="left"> <label for="ad_membre" >Adresse : </label></td> <td align="left"><input type="text" name="ad_membre" id="ad_membre" placeholder="Adresse du membre"  /></td></tr>

        <tr>     <td align="left"> <label for="email_membre" >E-mail : </label></td> <td align="left"><input type="email" name="email_membre" id="email_membre" placeholder="E-mail du membre"  /></td></tr>
     <tr>      <td align="left">   <label for="cin_membre" >CIN : </label></td> <td align="left"><input type="text" name="cin_membre" id="cin_membre" placeholder="CIN du membre"  /></td></tr>
            
      <tr>     <td align="left">   <label for="association" >Association :</label></td> <td align="left">
    
   <?php  
   if (isset($_POST["tab_of_association_name"]))
   {
       echo "<select name=\"association\" id=\"association\">  ";

       foreach ($_POST["tab_of_association_name"] as $value) {
           echo "<option value=\"".$value->get_id()."\" >   ".$value->get_nom()."</option>";
       }
        echo "</select></td></tr>";
        
        
   }
 else {
      echo "<select name=\"association\" id=\"association\" disabled>  ";
       echo "</select>";
       echo "il faut ajouter une association";
       echo "</td></tr>";
   }

           
  
    echo "<tr> <td align=\"left\"> <label for=\"fonction_association\" >Fonction dans l'Association : </label></td>";
   echo "<td align=\"left\"><select name=\"fonction_association\" id=\"fonction_association\"  > ";
       
        
        $file=fopen("c://wamp/www/mvc_test/libs/other/fonction_association.txt","r") or exit("Unable to open file!");
        while($vat=fgets($file))
  {
            echo "<option value=\"".$vat."\" >".$vat."</option>";
 
  }
  fclose($file);


    
            ?>
  </select>
     <a href="javascript:add()">autre...</a></td></tr>
    
    <tr> <td align="left"> <label for="date_debut_fonction" >Date début fonction : </label></td><td align="left"><input type="date" name="date_debut_fonction" id="date_debut_fonction" /></td></tr>
            
    
         <tr> <td align="right">   <input type="submit" value="Ajouter" name="submit" /></td></tr>
                
        

    </table>
    </form>
   </fieldset>

</article>

  </section>
           </body>
</html>


<script>

function  add()
{
   window.open("/mvc_test/membre/add_fonction","_blank","height=200,width=400,status=yes,toolbar=no,menubar=no,location=no")
}


</script>

