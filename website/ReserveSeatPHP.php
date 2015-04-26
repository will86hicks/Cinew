<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>

<html>
<body style="background-color:lightgrey">

<head>
<title> 
Reservations
</title>
</head>

<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: center;
}
caption{
	border: 1px solid black;
	font-size: 30;
}
</style>
</head>

<?php

	$allResult = mysql_query("SELECT * FROM cinplex") or die(mysql_error());
	
	$seatingArrang = array();
?>

<div align="center">

<?php
	// Access form variables
	$option = $_POST['complex'];
?>

<h3>Go Back</h3>

<form action="MovieListing.php">
<button>BACK</button>
</form>

</div>
</body>
</html>