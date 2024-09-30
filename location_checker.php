<!DOCTYPE html>

<html>
<head>
	<title>Get Location</title>
</head>
<body>
<?php
$host = "localhost";
$db_name = "bus";
$username = "root";
$password = "";

// Create a MySQLi instance
$conn =mysqli_connect($host, $username, $password, $db_name);
// Check if the connection is successful
// $SQL="insert into users (name) values ('sangam')";
// 	mysqli_query($conn,$SQL);
    // echo"sangam";
if (isset($_POST["latitude"]) && isset($_POST["longitude"])) {
	
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    // Perform any necessary operations with latitude and longitude values here
    // ...
	$latitude=sprintf("%0.4f", $latitude);
	$longitude=sprintf("%0.4f", $longitude);
	 echo $latitude." ".$longitude."\n";
	 
	
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
	<p id="latitude"></p>
	<p id="longitude"></p>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			getLocation();

			setInterval(function() {
				getLocation();
			}, 5000);
		});

		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else {
				alert("Geolocation is not supported by this browser.");
			}
		}

		function showPosition(position) {
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;
			$("#latitude").text("Latitude: " + latitude);
			$("#longitude").text("Longitude: " + longitude);

			$.ajax({
				type: "POST",
				url: window.location.href,
				data: { 
					latitude: latitude,
					longitude: longitude
				},
				success: function(response) {
					console.log(response);
				}
			});
		}
	</script>
	
</body>
</html>

