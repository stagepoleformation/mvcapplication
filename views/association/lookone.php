
            
<?php 
if(isset($_POST["association"])){
echo "<fieldset>";
echo "<legend><h1>Informations Générales</h1></legend>";

        echo    "<ul>";
             echo   "<li>Identifiant: ".   $_POST["association"][0]->get_id() ."</li>";
             echo  " <li>Nom: ". $_POST["association"][0]->get_nom()."</li>";
            echo    "<li>Adresse: ".  $_POST["association"][0]->get_adresse()."</li>";
         echo       "<li>Tel: ".$_POST["association"][0]->get_telephone() ."</li>";
          echo     " <li>Fax: ". $_POST["association"][0]->get_faxe() ."</li>";
                echo "<li>Email: ".  $_POST["association"][0]->get_email() ."</li>";
                    
               echo "<li>Président: ". $_POST["association"][0]->get_president() . "</li>";
            echo    "<li>Region: ". $_POST["association"][0]->get_region()."</li>";
              echo  "<li>Secteur d'activité: ".  substr($_POST["association"][0]->get_secteur(), 0, -1) ."</li>";
         echo   "</ul>";
        
echo "</fieldset>";

echo "<fieldset>";
echo "<legend><h1>Formations</h1></legend>";

if(isset($_POST["formation_assiste"])){
    
   
        
         echo "<table width=\"100%\" border=\"1\" id=\"table2\" class=\"displayy\">";
        echo "<thead>";
    
    echo "<tr>";
    
      echo "<th>";
    echo "Formation";
    echo "</th>";  
    echo "<th>";
    echo "Etat";
    echo "</th>";  
    echo "<th>";
    echo "Membres Présents";
    echo "</th>"; 
     
echo "</tr>";
    echo  "</thead>";
echo "<tbody>";
    foreach ($_POST["formation_assiste"] as $key => $value) {
        
    
    
    

    echo "<tr> ";
    echo "<td align=\"center\">";
echo "<a href=\"/mvc_test/formation/lookone/".$_POST["formations"][$key][0]->getId()."\" >".$_POST["formations"][$key][0]->getIntitule()."</a>";
    echo "</td>";
     echo "<td align=\"center\">";
   
     if($value->get_bool()==1) echo "Présente";
     else if($value->get_bool()==0)  echo "Absente";
     else if($value->get_bool()==2)  echo "inviter";
     echo "<a  href=\"javascript:etat(".$_POST["formations"][$key][0]->getId().",".$_POST["association"][0]->get_id().");\"> edit</a>";
    echo "</td>";
  
     echo "<td align=\"center\">";
     
    echo "<a href=\"javascript:liste(".$_POST["association"][0]->get_id().",".$_POST["formations"][$key][0]->getId().")\" >Liste</a>";
    echo "</td>";
  
    
echo "</tr> ";



   
    }
    echo "</tbody>";
    
    echo "</table>";
    
}

        
echo "</fieldset>";

echo "<fieldset>";
 echo   "<legend><h1>Membres</h1></legend>";
   echo "<table border=\"1\" id=\"table\" class=\"display\">";
        echo "<thead>";
    
    echo "<tr>";
    foreach ($_POST["noms_column"] as $value) {
      echo "<th>";
    echo $value;
    echo "</th>";  
    }
    echo "<th>
    <select id=\"Action\"  onchange=\"operation();\">
    <option value=\"0\">....</option>
  <option value=\"1\">Supprimer</option>
  <option value=\"2\">Modifier</option>
  <option value=\"3\">Imprimer</option>
</select>

</th> ";
echo "<th>" . "Plus" . "</th> ";

    
    echo "</tr>";
    echo  "</thead>";
    echo "<tbody>";
    if(isset($_POST["membre"])){
foreach ($_POST["membre"] as $value) {
    echo "<tr> ";
    echo "<td>";
    echo $value["idmembre"];
    echo "</td>";
     echo "<td>";
     echo $value["nommembre"];
  
    echo "</td>";
     echo "<td>";
      echo $value["prenommembre"];
    echo "</td>";
    echo "<td>";
      echo $value["nomfonction"];
    echo "</td>";
     echo "<td>";
     if($value["datefin"]=="0000-00-00") $value["datefin"]="En cours";
      echo $value["datedebut"]." - ".$value["datefin"];
    echo "</td>";
 
     
    echo "<td><input type=\"checkbox\" class=\"checkbox\" value=\"" . $value["idmembre"] . "\" ></td>";
     echo "<td><a href=\"/mvc_test/membre/lookone/".$_POST["association"][0]->get_id()."/" . $value["idmembre"] . "\"  ><img src=\"/mvc_test/libs/uploads/picture/plus.png\"  alt=\"plus\" height= \"40\" width=\"30\" ></a></td>";
    }}
echo "</tr> ";
echo "</tbody>";
echo "</table>";
echo "</fieldset>";

echo "<fieldset>";
 echo   "<legend><h1>Centre</h1></legend>";

echo "</fieldset>";
}
else {echo "Association non existante";} 
?>
    


</section>
</body>
</html>



<script src="/mvc_test/libs/js/DataTables/media/js/jquery.dataTables.js"  ></script>


<script>
    function liste(id_association,id_formation){
               var ok=window.open("/mvc_test/association/liste_membres_present_d_formationx/"+id_association+"/"+id_formation,"windows",'width=800,height=500' ); 

        
        
        
    }
    
    
    
        $('head').append(' <link rel="stylesheet" href="/mvc_test/libs/js/DataTables/media/css/demo_table.css" />');


    
    function operation()
    {
//alert($("select#Action").val()===1);
        if ($("select#Action").val() == 1) {
          
var delete_elemtent=new Array(); 
                $("input:checkbox").each(function()
                {
                    if ($(this).is(':checked') === true)
                    {
                        delete_elemtent.push($(this).val()); 
                        $(this).parent().parent().remove();
                    }
                }
            );
                if(delete_elemtent.length==0) {  $("select#Action").val('0');}
                else{
           
var deletee = window.open("/mvc_test/membre/delete/" + delete_elemtent, "windows", 'width=800,height=500');
                  //      deletee.close();
                       
                       $("select#Action").val('0');
                // this.href=\"/mvc_test/animateur/delete/" . $_POST["id"] ."\" ;
            }

        }

        else if ($("select#Action").val() == 2) {
        var delete_elemtent=new Array(); 

        
         $("input:checkbox").each(function()
                {
                    if ($(this).is(':checked') === true)
                    {
                        delete_elemtent.push($(this).val()); 
                                    $(this).prop('checked', false);
                    }
                }
            );
                if(delete_elemtent.length==0) {$("select#Action").val('0'); }
                else  {
var deletee = window.open("/mvc_test/membre/modify/" + delete_elemtent, "windows", 'width=800,height=500');
$("select#Action").val('0');
}

        }
        else if ($("select#Action").val() == 3) {

        }
        //$("input:checkbox").each(function() { alert($(this).is(':checked')); });
        //alert($("select#Action").val());




    }

  var fr= {  "sProcessing":     "Traitement en cours...",
    "sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
    "sInfo":           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    "sInfoEmpty":      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    "sInfoPostFix":    "",
    "sLoadingRecords": "Chargement en cours...",
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
    "sEmptyTable":     "Aucune donnée disponible dans le tableau",
    "oPaginate": {
        "sFirst":      "Premier",
        "sPrevious":   "Pr&eacute;c&eacute;dent",
        "sNext":       "Suivant",
        "sLast":       "Dernier"
    },
    "oAria": {
        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
    }};
$(document).ready(function()

{
    
    $('#table').dataTable(
        {
    "aLengthMenu": [[5,1,10, 25, 50, -1], [5,1,10, 25, 50, "All"]],
    "bFilter": false,"bInfo": false,
    "oLanguage": fr,
    "iDisplayLength": 20
  
    } );
         $('#table2').dataTable(
        {
    "aLengthMenu": [[5,1,10, 25, 50, -1], [5,1,10, 25, 50, "All"]],
    "bFilter": false,"bInfo": false,
    "oLanguage": fr,
    "iDisplayLength": 20
  
    } );    
           
    
}
);
    
     function etat(form,assoc)
    {
        var deletee = window.open("/mvc_test/association/etat/" + form+"/"+assoc, "windows", 'width=333,height=222');

             
       }
</script>