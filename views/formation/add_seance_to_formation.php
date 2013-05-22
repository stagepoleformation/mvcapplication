    <form method="post"  action="/mvc_test/formation/add_seance_to_formation"  enctype="multipart/form-data">
    
    <label for="nom_seance" >Nom : </label><input type="text" name="nom_seance" id="nom_seance" placeholder="Nom Seance"  /><br/>
    <label for="groupe" >Groupe: </label>
    <select name="groupe">
        </select><br/>
  <label for="debut_seance" >Debut Seance : </label><input type="datetime-local" name="debut_seance" id="debut_seance"  /><br/>
   <label for="fin_seance" >Fin Seance : </label><input type="datetime-local" name="fin_seance" id="fin_seance"  /><br/>

     <input type="submit" name="submit" value="Ajouter" id="submit" /><br/>
      <input type="submit" name="fermer" value="fermer" onclick="close_reload();" /><br/>
</form>
    
<script>
    
   
        var groupe =window.opener.document.getElementsByClassName("groupe");
       
       for(var i=0,l=groupe.length;i<l;i++)
           {
              
               var option =document.createElement('option');
              
               option.setAttribute('name', groupe[i].innerHTML);
               option.setAttribute('value', groupe[i].getAttribute("id"));   
               option.innerHTML=groupe[i].innerHTML;
               window.document.getElementsByTagName("select")[0].appendChild(option);

           }

     //   window.document.getElementsByTagName("select")
        
    function close_reload()
    {
           window.opener.location.reload();   
       self.close();

        
    }
   $('#fofo').remove();

    
    </script>