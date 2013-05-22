<br/><br/>


<article>
    <fieldset>
        <legend><h1>Ajout d'un association Dans la base de données</h1></legend>
        <form  method="post"  action="/mvc_test/association/add"  enctype="multipart/form-data"> 
            <table >
                <tr>

                <td align="left">  <label for="nom_association" >Nom : </label></td>    <td align="left"><input type="text" name="nom_association" id="nom_association" placeholder="Nom de l'association"  /></td>
                </tr>
                <tr>
                    <td align="left">   <label for="tel_association" >Telephone : </label></td><td align="left"> <input type="text" name="tel_association" id="tel_association" placeholder="Telephone de l'association"  /></td>
                </tr>
                <tr>
                    <td align="left">  <label for="fax_association" >Fax : </label></td><td align="left"><input type="text" name="fax_association" id="fax_association" placeholder="Fax de l'association"  /></td>
                </tr>
                <tr>

                    <td align="left">   <label for="ad_association" >Adresse : </label></td><td align="left"><input type="text" name="ad_association" id="ad_association" placeholder="Adresse de l'association"  /></td>
                </tr>
                <tr>
                    <td align="left"> <label for="email_association" >E-mail : </label></td><td align="left"><input type="email" name="email_association" id="email_association" placeholder="E-mail de l'association"  /></td>
                </tr>
                <tr>



                    <td align="left">  <label for="region_association" >Region : </label></td><td align="left">
                        <select name="region_association" id="region_association">  
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
                        </select></td>
                </tr>
                <tr>
                    <td align="left">
                        <label for="secteur_association" >Secteur d'activité : </label></td><td align="left">
                        <input type="text" name="secteur_association" id="secteur_association" placeholder="secteur d'activité" value="" readonly />
                        <?php
                        echo "<select name=\"secteur\" id=\"secteur\"  onchange=\"operation();\" > ";


                        $file = fopen("c://wamp/www/mvc_test/libs/other/secteur_association.txt", "r") or exit("Unable to open file!");
                        echo "<option value=\"...\" >...</option>";
                        while ($vat = fgets($file)) {
                            echo "<option value=\"" . $vat . "\" >" . $vat . "</option>";
                        }
                        fclose($file);
                        ?>
                        </select>

                        <a href="javascript:add()">autre...</a>
                    </td>
                </tr>



                <tr>
                    <td align="right"></td><td align="left"><br/>
                        <input type="submit" value="Ajouter" name="submit" /></td></tr>
                
                </tr>
            </table>
            <input type="hidden" name="president_association" value="" id="president_association" placeholder="Président de l'association"  /><br/>
        </form>
    </fieldset>
</article>


</section>
</body>
</html>

<script>
    function operation()
    {
        $("#secteur_association").val($("#secteur").val() + "," + $("#secteur_association").val());



    }

    function  add()
    {

        window.open("/mvc_test/association/add_secteur", "_blank", "height=200,width=400,status=yes,toolbar=no,menubar=no,location=no")
    }


</script>