<?php 
if(isset($_POST["formation"]))
{
    echo "<h2>Sélectionner une formation</h2>";
    echo "<select>";
     echo "<option value=\"\" >.....</option>";
    foreach ($_POST["formation"] as $value) {
        echo "<option value=\"".$value->getId()."\" >".$value->getIntitule()."</option>";
        
        
    }
    echo "</select>";
  echo  "<h3 hidden>Associations invitées avec succés</h3><br/>";
  echo  "<h4 hidden>Listes des Emails</h4>";
    echo "<input type=\"hidden\" value=\"".$_POST["ids"]."\">";
    
    echo "<div id=\"divi\"></div><br/>";
    
    
    
}


?>


<script>


$('select').change(function(){
 //   alert($("input").val());
   // window.open("/mvc_test/association/inviter/"+$("select option:selected").val(), "windows", 'width=800,height=500');
    $.ajax({
  url: "/mvc_test/association/inviter/"+$("input").val()+"/"+$("select option:selected").val()
    }).done(function(){
       // alert("dsf");
       
        $("#divi").load("/mvc_test/association/mailing/"+$("input").val()+"/"+$("select option:selected").val()+" #ok");
        $("h3").removeAttr("hidden");
                $("h4").removeAttr("hidden");

    //   $("#mailing").text($.load("/mvc_test/association/inviter/4,"));
      
});
    });
    


</script>