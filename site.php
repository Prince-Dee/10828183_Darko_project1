<?php
//start session
session_start();

//Connect to the database
$hostname = "localhost";
$username = "root";
$pass = "";
$database = "software_eng";

$sql = new mysqli($hostname, $username, $pass, $database);
if(mysqli_connect_error()) {
	echo "Could not connect to the database: ".$sql->error;
} 


if(!isset($_SESSION["email"])) {
	header("location: ../index.html");
} else {
	$email = $_SESSION["email"];

	$details = "SELECT * FROM users WHERE email = '$email'";
	$details_result = $sql->query($details);
	if($details_result->num_rows > 0) {
		while($info = $details_result->fetch_assoc()) {
			$fname = $info["fname"];
			$lname = $info["lname"];
			$sn = $info["sn"];
			$dob = $info["dob"];
			$contact = $info["contact"];
			$email = $info["email"];
		}
	}

	
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../site.css">
</head>
<body>
	<div class="whole">
	<div class="sescond">
	<p>Registered</p>
	<p>First Name: <?php echo $fname ?> </p>
	<p>Second Name: <?php echo $lname ?></p>
	<p>Serial Number: <?php echo $sn ?></p>
	<p>Date of Birth: <?php echo $dob ?></p>
	<p>Contact: <?php echo $contact ?></p>
	<P>Email: <?php echo $email ?></P>
	<br>
	<button onclick="window.location = '../php/logOut.php';">Log Out</button>
	</div>
	</div>
	</body>
</html>