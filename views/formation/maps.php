
    <div id="map-canvas"  style="width: 100%; height: 50%" />
    </section>
  </body>
</html>


<script type="text/javascript">
    var headID = document.getElementsByTagName("head")[0];
    
    var cssNode = document.createElement('link');
    cssNode.rel = 'stylesheet';
    cssNode.href = '/mvc_test/libs/css/maps.css';
    headID.appendChild(cssNode);
</script>
 <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqgEi-VNj87Bc8RTf2Von4ZNf8AulX9sg&sensor=true">
    </script>
    <script type="text/javascript">
	var a=new google.maps.LatLng(34.095387,-6.763866);
	//var z;
      function initialize() {

        var mapOptions = {
          center: new google.maps.LatLng(34.095387,-6.763866),
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.HYBRID  
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
				  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position:  a
  });
 // z=marker;

      }
	   
      google.maps.event.addDomListener(window, 'load', initialize);
	/*  while(1)
	  {
	  var b=new google.maps.LatLng(34.095387,-6.763866);
	  if(a.equals(z)) {alert("ok");}
	  } */

    </script>