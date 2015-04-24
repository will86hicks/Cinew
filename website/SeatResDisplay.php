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
	$cinemaID = $_POST['cinplexID'];
	$title = $_POST['title'];
	$theater = $_POST['theater'];
	
	$seatchart = mysql_query("SELECT seat_chart FROM theater t where t.cinplex_id = {$cinemaID} and t.number = {$theater}") or die(mysql_error());
	$seatchart = mysql_fetch_array($seatchart);
	$seatchart = $seatchart['seat_chart'];
	$seatchart = explode("x",$seatchart);
	
	$numRows = $seatchart[0];
	$numCols = $seatchart[1];
	
	//echo $numCols;

	
	if($cinema != "all"){
		echo
		"<table style='width:50%'>
			<caption>{$title} at the {$cinema}</caption>
			<tr>
			<th></th>";
		
	
	
		for($i = 1; $i <= $numCols; $i++){
			echo "<th>Column-{$i}</th>";
		};
		
	
		echo
			"</tr>";
		for($j = 1; $j <= $numRows; $j++){
			echo "<tr><th>Row-{$j}</th>";
			
			for($k = 1; $k <= $numCols; $k++){				
				echo "<th><input type='button' value='Reserve\n Seat' style='height:50px; width:75px'/> </th>";
			};
			echo "</tr>";
		};
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