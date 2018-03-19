<?php
$servername = "localhost";
$username = "rvtiincu_binusr";
$password = "TeTk{rv_sUMh";
$dbname = "rvtiincu_trashbin";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT lat,lng,state FROM bins";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       // echo "lat: " . $row["lat"]. " - lng: " . $row["lng"]. " " .$row["state"]. "<br>";
        
       $msg=  ",{ position: new google.maps.LatLng(".$row["lat"].", ".$row["lng"]. "), type: '".$row["state"]."'}".$msg;
      
    } 
  $msg= substr($msg,1);
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Trash Levels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: new google.maps.LatLng(0.6711880,35.5070199),
          mapTypeId: 'roadmap'
        });

        

        var iconBase = './images/';
        var icons = {
          empty: {
            icon: iconBase + 'empty.png'
          },
          half: {
            icon: iconBase + 'mid.png'
          },
          full: {
            icon: iconBase + 'full.png'
          }
        };

        var features = [
          
          <?php echo $msg; ?>
          
        ];

        // Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmxEfsV4biTy3aO_7iiFFb4i0eEGjVfdf7&callback=initMap">
    </script>
  </body>
</html>
