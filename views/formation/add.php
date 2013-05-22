
 <fieldset>
        <legend><h1>Ajout d'une Formation</h1></legend>
<form method="post"  action="/mvc_test/formation/add"  enctype="multipart/form-data"> 
        <table>
       

            <tr><td align="left"><label for="nom_formation" >Intitulé : </label> </td><td align="left"><input type="text" name="nom_formation" id="nom_formation" placeholder="Intitulé de la Formation"  /></td></tr>
            <tr><td align="left"><label for="date_debut_formation" >Date debut : </label> </td><td align="left"><input type="date" name="date_debut_formation" id="date_debut_formation" /></td></tr>
            <tr><td align="left"><label for="date_fin_formation" >Date fin : </label> </td><td align="left"><input type="date" name="date_fin_formation" id="date_fin_formation" /></td></tr>
            <tr><td align="left"><label for="lieu_formation" >Lieu : </label> </td><td align="left"><input type="text" name="lieu_formation" id="lieu_formation" placeholder="Lieu de la Formation"/></td></tr>
            <tr><td align="left"><label for="adresse_lieu_formation" >Adresse Lieu : </label> </td><td align="left"><input type="text" name="adresse_lieu_formation" id="adresse_lieu_formation" placeholder="Adresse Lieu de la Formation"/></td></tr>
            
            <tr><td align="left"><label for="lieu_formation" >Plan : </label> </td><td align="left">
                    <a id="maps" href="javascript:maps()" >Ajouter le Plan d'accès</a> <input type="hidden" name="plan_accees" id="position" value="" /></td></tr>
         <tr> <td align="left">  Type :</td> <td align="left"><input type="radio" name="formation_type" value="action" id="formation_action" /><label for="formation_action">Action</label>
          <input type="radio" name="formation_type" value="normale" id="formation_normale" /> <label for="formation_normale" >Normale</label> </td></tr>
            <tr> <td align="right">  <input type="submit" value="Submit" name="submit" /></td></tr>
    </table>
</form>
      
    </fieldset>

</section>

</body>
</html>


<script>
    function maps() {

        var ok = window.open("/maps_api/", "windows", 'width=800,height=500');




    }
    function okok(position)
    {
        document.getElementById("maps").parentNode.removeChild(document.getElementById("maps"));
        var taga = document.getElementById("position");
        taga.type = "text";
        taga.value = position;



    }


</script>