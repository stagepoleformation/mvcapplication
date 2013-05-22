<form method="post"  action="/mvc_test/formation/add_groupe_to_formation"  enctype="multipart/form-data">
    
    <label for="nom_groupe" >Nom : </label><input type="text" name="nom_groupe" id="nom_groupe" placeholder="Nom groupe"  /><br/>
    <label for="cible_groupe" >Personnes Ciblées: </label><input type="text" name="cible_groupe" id="date_debut_formation" /><br/>
    <input type="hidden" name="id_formation"  value="ddd" /><br/>
     <input type="submit" name="submit" value="Ajouter" id="submit" /><br/>
      <input type="submit" name="fermer" value="fermer" onclick="close_reload();" /><br/>
</form>
    
    

<script>
     window.document.getElementsByTagName("input")[2].setAttribute("value",window.opener.document.getElementById("id").getAttribute("value"));

    
    function close_reload()
    {
           window.opener.location.reload();   
       self.close();

        
    }
    $('#fofo').remove();

    </script>
    
    
    
