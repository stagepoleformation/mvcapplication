<input type="text"  name="search" onkeydown="changed()" >
<select id="search"  >
    <option value="....">....</option>
    <option value="intitule">Intitulé</option>
    <option value="type">Type</option>
    <option value="emplacement">Emplacement</option>
    <option value="adresse">Adresse</option>
    <option value="date">Date</option>
     <option value="id">identifiant</option>
</select>



<?php
$size2 = count($_POST["noms_column"]);
echo "<br/><br/>";
echo "<article>";
echo "<fieldset>";
echo "<legend><h1>Liste des Formations</h1></legend>";
echo "<table border=\"1\" id=\"table\" class=\"display\"> ";


echo  "<thead>";
echo "<tr  > ";
for ($j = 0; $j < $size2; $j++) {

    echo "<th>" . $_POST["noms_column"][$j] . "</th> ";
}
echo "<th id=\"selectrows\">
    <select id=\"Action\"  onchange=\"operation();\">
    <option value=\"0\">....</option>
  <option value=\"1\">Supprimer</option>
  <option value=\"2\">Modifier</option>
  <option value=\"3\">Imprimer</option>
</select>

</th> ";

//echo "<th>" . "Supprimer" . "</th> ";
echo "<th id=\"plusrow\">" . "Plus" . "</th> ";

echo "</tr> ";

echo  "</thead>";
echo "<tbody>";

$gett = '';

foreach ($_POST["donnees"] as $object) {
    $i = 0;

    echo "<tr> ";

    while ($i < $size2) {

        $temp = $object->get_getter();
        if ($i == 0) {
            $id_val = $temp;
        }


        echo "<td class=\"" . $_POST["noms_column"][$i] . "\">" . $temp . "</td>";
        $i++;
    }

    echo "<td class=\"checkboxx\"><input type=\"checkbox\" class=\"checkbox\" value=\"" . $id_val . "\" ></td>";


    echo "<td class=\"pluss\"><a href=\"/mvc_test/formation/lookone/" . $id_val . "\"  ><img src=\"/mvc_test/libs/uploads/picture/plus.png\"  alt=\"plus\" height= \"40\" width=\"30\" ></a></td>";


    echo "</tr> ";
}
echo "</tbody>";
echo "</table></fieldset></article>";
?>

<script>

 $('head').append(' <link rel="stylesheet" href="/mvc_test/libs/js/DataTables/media/css/demo_table.css" />');

    function changed()
    {

        if ($("select#search").val() == "intitule") {

            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("Intitulé")[0];

                var b = y.innerHTML.search(re);

                if (b !== 0) {
                    x[i].setAttribute("hidden");
                }
                else if (b == 0 & x[i].hasAttribute("hidden")) {
                    x[i].removeAttribute("hidden");
                }

                i++;
            }

        }
        else if ($("select#search").val() == "type") {
            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("type")[0];

                var b = y.innerHTML.search(re);

                if (b !== 0) {
                    x[i].setAttribute("hidden");
                }
                else if (b == 0 & x[i].hasAttribute("hidden")) {
                    x[i].removeAttribute("hidden");
                }

                i++;
            }

        }
        else if ($("select#search").val() == "adresse") {
            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("Adresse")[0];

                var b = y.innerHTML.search(re);

                 if (b < 0) {
                x[i].setAttribute("hidden");
            }
            else if (b >= 0 & x[i].hasAttribute("hidden")) {
                x[i].removeAttribute("hidden");
            }

                i++;
            }

        }
          else if ($("select#search").val() == "emplacement") {
            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("Emplacement")[0];

                var b = y.innerHTML.search(re);

                if (b < 0) {
                x[i].setAttribute("hidden");
            }
            else if (b >= 0 & x[i].hasAttribute("hidden")) {
                x[i].removeAttribute("hidden");
            }

                i++;
            }

        }
        else if ($("select#search").val() == "id") {

            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("identifiant")[0];

                var b = y.innerHTML.search(re);

                if (b !== 0) {
                    x[i].setAttribute("hidden");
                }
                else if (b == 0 & x[i].hasAttribute("hidden")) {
                    x[i].removeAttribute("hidden");
                }

                i++;
            }

        }
        else if ($("select#search").val() == "date") {

            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("Date-debut")[0];

                var b = y.innerHTML.search(re);

                 if (b < 0) {
                x[i].setAttribute("hidden");
            }
            else if (b >= 0 & x[i].hasAttribute("hidden")) {
                x[i].removeAttribute("hidden");
            }

                i++;
            }

        }




    }
</script>
</section>
</body>
</html>

<script src="/mvc_test/libs/js/DataTables/media/js/jquery.dataTables.js"  ></script>

<script>
var all="";
var pdp;
var npn="formation";
var titl="";
    function operation()
    {
//alert($("select#Action").val()===1);
        if ($("select#Action").val() == 1) {

            var delete_elemtent = new Array();
            $("input:checkbox").each(function()
            {
                if ($(this).is(':checked') === true)
                {
                    delete_elemtent.push($(this).val());
                    $(this).parent().parent().remove();
                }
            }
            );
            if (delete_elemtent.length == 0) {
                $("select#Action").val('0');
            }
            else {

                var deletee = window.open("delete/" + delete_elemtent, "windows", 'width=800,height=500');
                deletee.close();

                $("select#Action").val('0');
                // this.href=\"/mvc_test/animateur/delete/" . $_POST["id"] ."\" ;
            }

        }

        else if ($("select#Action").val() == 2) {
            var delete_elemtent = new Array();


            $("input:checkbox").each(function()
            {
                if ($(this).is(':checked') === true)
                {
                    delete_elemtent.push($(this).val());
                    $(this).prop('checked', false);
                }
            }
            );
            if (delete_elemtent.length == 0) {
                $("select#Action").val('0');
            }
            else {
                var deletee = window.open("modify/" + delete_elemtent, "windows", 'width=800,height=500');
                $("select#Action").val('0');
            }

        }
        else if ($("select#Action").val() == 3) {
             $("select#Action").val('0');
        
            var rows_elemtent=""; 
                $("input:checkbox").each(function()
                {
                    if ($(this).is(':checked') === true)
                    {
                        
                        rows_elemtent+="<tr>"+$(this).parent().parent().html()+"</tr>"; 
                        $(this).prop('checked', false);
                        
                    }
                }
            );
              
              all="<table border=\"1\"  id=\"table\" class=\"display\"><thead>"+$("thead").html()+"</thead><tbody>"+rows_elemtent+"</tbody></table>";
     
           //   $("textarea").text(all);
            //  all.$("#selectrows").parent().remove("#selectrows");
            //  var ndx = $("#selectrows").parent().index() + 1;
              //alert($("#selectrows").parent().html());
             //$("td", event.delegateTarget).remove(":nth-child(" + ndx + ")");
titl=prompt("Entrer le titre de la première feuille");
var deletee = window.open("/mvc_test/libs/other/print/print.html", "windows", 'width=800,height=500');
                     

        }
       



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
    "aLengthMenu": [[1,5,10, 25, 50, -1], [1,5,10, 25, 50, "All"]],
    "bFilter": false,"bInfo": false,
   "oLanguage": fr
    } );
            
           
    
}
);
</script>