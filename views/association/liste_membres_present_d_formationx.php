<?php


echo "<fieldset>";
echo "<legend><h1>Membres presents</h1></legend>";
         echo "<table width=\"100%\" border=\"1\" id=\"table2\" class=\"displayy\">";
        echo "<thead>";

    
      echo "<th>";
    echo "Membre";
    echo "</th>";  
    echo "<th>";
    echo "Groupe";
    echo "</th>";
      echo "<th>";
    echo "Supprimer";
    echo "</th>"; 
     
echo "</tr>";
    echo  "</thead>";
echo "<tbody>";
if(isset($_POST["view"])){
   // print_r($_POST["view"]);
foreach ($_POST["view"] as $value) {
    
    echo "<tr> ";
    echo "<td align=\"center\">";
    echo  "<a href=\"/mvc_test/membre/lookone/".$_POST["idassociation"]."/".$value["idmembre"]."\">".$value["nmembre"].' '.$value["pnmembre"]."</a>";
    
       echo "</td>";
       echo "<td align=\"center\">";
   echo $value["ngroupe"];
       echo "</td>";
        echo "<td align=\"center\">";
   echo "<input type=\"checkbox\" class=\"checkboxx\"  value=\"".$_POST["idformation"]."/".$value["idmembre"]."/".$value["idgroupe"]."\" \">";
       echo "</td>";
echo "</tr> ";
    
}}
echo "</tbody>";
echo "</table>";
echo "</fieldset>";

echo "<select id=\"groupe\" hidden>";
echo "<option value=\"\" >____</option>";
    foreach ($_POST["groupes"] as $valuee) {
   echo "<option value=\"".$valuee->getId()."\">".$valuee->getNom()."</option>";
    }
    echo "</select><br/>";
    
foreach ($_POST["membres"] as $value) {
echo "<ul>";
 
    echo "<li>";
    echo "<input type=\"checkbox\" class=\"checkbox\"  value=\"".$value->getId()."\" \">"; 
    echo "<label for=\"".$value->getId()."\">[".$value->getId()."] ".$value->getNom()." ".$value->getPrenom()."</label>"; 
    echo "</li>";
     echo "</ul>";
}

echo "<input type=\"hidden\" id=\"idassociation\" value=\"".$_POST["idassociation"]."\" >";
 echo "<input type=\"hidden\" id=\"idformation\" value=\"".$_POST["idformation"]."\" >";

   
?>
</section>
</body>
</html>

<script>
    var ids="";
    $('.checkbox').change(
        function(){
    if(this.checked){
        ids+=$(this).attr('value')+',';
        $('select').removeAttr('hidden');
        
    }});
    $('select').change(function(){
        
       //alert($("select option:selected").val());
      // alert(ids);
     // alert($("#idformation").val());
    //window.open("/mvc_test/association/add_membre_to_formation/"+ids+"/"+$("select option:selected").val()+"/"+$("#idassociation").val()+"/"+$("#idformation").val(), "windows", 'width=800,height=500');
     $.ajax({
  url: "/mvc_test/association/add_membre_to_formation/"+ids+"/"+$("select option:selected").val()+"/"+$("#idassociation").val()+"/"+$("#idformation").val()
    }).done(function(){window.location.reload();});

  ids="";
    });
    
    
    document.getElementById("fofo").parentNode.removeChild(document.getElementById("fofo"));

  


$('.checkboxx').change(function(){
    $(this).parent().parent().remove();
     //window.open("/mvc_test/membre/delete_from_formation/"+$(this).attr('value'), "windows", 'width=800,height=500');
  $.ajax({
  url: "/mvc_test/membre/delete_from_formation/"+$(this).attr('value')
    });
    
});

           
     
           
</script>