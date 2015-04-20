<?php
include 'login.php'
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

<?php
	// Access form variables
	$cinema = $_POST['complex'];
	$title = $_POST['title'];
	if($cinema != "all"){
		echo
		"<table style='width:50%'>
			<caption>{$title} at the {$cinema}</caption>
			<tr>
				<th></th>
				<th>Column-1</th>
				<th>Column-2</th>
				<th>Column-3</th>
			</tr>
			<tr>
				<th>Row-1</th>
				<th><input type='button' value='Reserve Seat' style='height:50px; width:100px'/> </th>
				<th><input type='button' value='Reserve Seat' style='height:50px; width:100px'/> </th>
				<th><input type='button' value='Reserve Seat' style='height:50px; width:100px'/> </th>
			</tr>";
		echo"</table>";
	}else{
		echo"all";
	}
?>

<div align="center">
<h3>Go Back</h3>

<form action="SeatResForm.php" method="POST">
<button>BACK</button>
</form>

</div>
</body>
</html>