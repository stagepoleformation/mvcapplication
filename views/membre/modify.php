

<article>
         <fieldset>
  <legend><h1>Modification</h1></legend>
    <form  method="post"  action="/mvc_test/membre/modify"  enctype="multipart/form-data"> 
       
    <table>
 <tr>   <td align="left"></td> <td align="left"><input type="hidden" name="id_membre" id="id_membre" value="<?php echo $_POST["submit"][0]->getId() ?>" /></td></tr>
         <tr>   <td align="left"> <label for="nom_membre" >Nom : </label></td> <td align="left"><input type="text" name="nom_membre" id="nom_membre" value="<?php echo $_POST["submit"][0]->getNom() ?>"  /></td></tr>
    <tr>       <td align="left">   <label for="pnom_membre" >Prenom : </label></td> <td align="left"><input type="text" name="pnom_membre" id="pnom_membre"  value="<?php echo $_POST["submit"][0]->getPrenom() ?>"  /></td></tr>
        <tr>     <td align="left"> <label for="tel_membre" >Telephone : </label></td> <td align="left"><input type="text" name="tel_membre" id="tel_membre"  value="<?php echo $_POST["submit"][0]->getTelephone() ?>"  /></td></tr>
        <tr>     <td align="left"> <label for="ad_membre" >Adresse : </label></td> <td align="left"><input type="text" name="ad_membre" id="ad_membre"  value="<?php echo $_POST["submit"][0]->getAdresse() ?>"  /></td></tr>

        <tr>     <td align="left"> <label for="email_membre" >E-mail : </label></td> <td align="left"><input type="email" name="email_membre" id="email_membre"  value="<?php echo $_POST["submit"][0]->getEmail() ?>"  /></td></tr>
     <tr>      <td align="left">   <label for="cin_membre" >CIN : </label></td> <td align="left"><input type="text" name="cin_membre" id="cin_membre"  value="<?php echo $_POST["submit"][0]-> getCin() ?>"  /></td></tr>
          
         <tr> <td align="right">   <input type="submit" value="Modifier" name="submit" /></td></tr>
                
        

    </table>
    </form>
   </fieldset>
</article>




<script>

$('#fofo').remove();
</script>