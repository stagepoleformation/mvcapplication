 <article>
    <form  method="post"  action="/mvc_test/association/modify"  enctype="multipart/form-data"> 
        <fieldset>
  <legend><h1>Modifier</h1></legend>
        <p>
        <label for="id_association" >ID : </label><input type="text" value="<?php  echo $_POST["result"][0]->get_id() ?>" name="id_association" id="id_association"  /><br/>
            <label for="nom_association" >Nom : </label><input type="text" value="<?php  echo $_POST["result"][0]->get_nom() ?>" name="nom_association" id="nom_association" placeholder="Nom de l'association"  /><br/>
 
            <label for="tel_association" >Telephone : </label><input type="text" value="<?php  echo $_POST["result"][0]->get_telephone() ?>" name="tel_association" id="tel_association" placeholder="Telephone de l'association"  /><br/>
             <label for="fax_association" >Fax : </label><input type="text" value="<?php  echo $_POST["result"][0]->get_faxe() ?>" name="fax_association" id="fax_association" placeholder="Fax de l'association"  /><br/>
            <label for="ad_association" >Adresse : </label><input type="text" value="<?php  echo $_POST["result"][0]->get_adresse() ?>" name="ad_association" id="ad_association" placeholder="Adresse de l'association"  /><br/>

            <label for="email_association" >E-mail : </label><input type="email" value="<?php  echo $_POST["result"][0]->get_email() ?>" name="email_association" id="email_association" placeholder="E-mail de l'association"  /><br/>
           

            <label for="president_association" >Président : </label><input type="text" value="<?php  echo $_POST["result"][0]->get_president() ?>" name="president_association" id="president_association" placeholder="Président de l'association"  /><br/>

            <label for="region_association" >Region : </label>
    <select name="region_association" id="region_association"  >  
        <option value=<?php echo $_POST["result"][0]->get_region() ?> ><?php echo $_POST["result"][0]->get_region() ?></option>
    <option value="Eddahab_Lagouira">Oued-Eddahab - Lagouira</option>
        <option value="Chaouia_Ouardigha">Chaouia-Ouardigha</option>
        <option value="Marrakech_Tensift_Haouz">Marrakech-Tensift-Al Haouz</option>
        <option value="Oriental">L'Oriental</option>
        <option value="Rabat_Sale_Zemmour_Zaer">Rabat-Salé-Zemmour-Zaër</option>
        <option value="Doukkala_Abda">Doukkala-Abda</option>
        <option value="Tadla_Azilal">Tadla-Azilal</option>
        <option value="Meknes_Tafilalet">Meknès-Tafilalet</option>
        <option value="Fes_Boulemane">Fès-Boulemane</option>
        <option value="Taza_Taounate_Hoceima">Taza-Taounate-Al Hoceima</option>
        <option value="Tanger_Tetouan">Tanger-Tétouan</option>
        <option value="Souss_Massa_Draa">Souss-Massa-Draa</option>
        <option value="Grand_Casablanca">Grand Casablanca</option>
        <option value="Guelmim_Esmara">Guelmim-Esmara</option>
        <option value="Gharb_Cherarda_Beni_Hsan">Gharb-Cherarda-Beni Hsan</option>
        <option value="Laayoune_Boujdour_Sakia_El_Hamra">Laayoune-Boujdour-Sakia El Hamra</option>
    </select><br/>
                 <label for="secteur_association" >Secteur d'activité : </label>
<input type="text" name="secteur_association"  value="<?php  echo $_POST["result"][0]->get_secteur() ?>" id="secteur_association" placeholder="secteur d'activité" value="" readonly />
   <?php  


        
  
   echo "<select name=\"secteur\" id=\"secteur\"  onchange=\"operation();\" > ";
       
        
        $file=fopen("c://wamp/www/mvc_test/libs/other/secteur_association.txt","r") or exit("Unable to open file!");
          echo "<option value=\"...\" >...</option>";
        while($vat=fgets($file))
  {
            echo "<option value=\"".$vat."\" >".$vat."</option>";
 
  }
  fclose($file);


    
            ?>
  </select>
     <a href="javascript:add()">autre...</a>
     <br/>
            
            
            <input type="submit" value="Submit" name="submit" /><br/>
        </p>

 </fieldset>
    </form>
     

<script>
    
 
   function operation()
    {
        $("#secteur_association").val($("#secteur").val()+","+$("#secteur_association").val());
        
        
        
    }
    
function  add()
{
 
   window.open("/mvc_test/association/add_secteur","_blank","height=200,width=400,status=yes,toolbar=no,menubar=no,location=no")
}

$('#fofo').remove();
</script>
