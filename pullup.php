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
   echo substr($msg,1);
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
