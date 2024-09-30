<?php
echo '<script type="text/javascript">getLocation();</script>';
include('dbconn.php');
$SQL="insert into user (name) values ('sangam')";
mysqli_query($conn,$SQL);
if (isset($_GET["latitude"]) && isset($_GET["longitude"])) {

    $latitude = $_GET["latitude"];
    $longitude = $_GET["longitude"];
    $latitude=sprintf("%0.4f", $latitude);
	$longitude=sprintf("%0.4f", $longitude);
    // echo $latitude." ".$longitude."\n";

    $a='valid';
	$sql7="SELECT * from ticket WhERE job_enable=1 and status='$a'";
	$result7=mysqli_query($conn,$sql7);
	echo mysqli_num_rows($result7)."\n";
	if(mysqli_num_rows($result7)>0){
		while($z=mysqli_fetch_assoc($result7)){
			$lat1=$z['latitude'];
			$lon1=$z['longitude'];
			$ticketid=$z['ticketid'];
			// echo "lon1=".$lon1;
		
		// echo 'ticketid='.$ticketid;
		if (( $latitude >= $lat1 - 0.0015 && $latitude <= $lat1 + 0.0015) && ( $longitude >= $lon1 - 0.0015 && $longitude <= $lon1 + 0.0015)) {
			echo 'good to go';
			$sql8="UPDATE ticket set status='invalid' WhERE job_enable=1 and ticketid='$ticketid'";
			mysqli_query($conn,$sql8);
		}
		}
	}
}

?>
<!DOCTYPE html>
<html>
    <head>


<script>

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
    if (!sessionStorage.getItem('locationSet')) {
  var latitude=position.coords.latitude;  
  var longitude =position.coords.longitude;
 
  window.location.href = "zemo.php?latitude=" + latitude + "&longitude=" + longitude;
  sessionStorage.setItem('locationSet', true);
}

}
</script>

    </head>


<body>

<p>Click the button to get your coordinates.</p>







</body>
</html>

