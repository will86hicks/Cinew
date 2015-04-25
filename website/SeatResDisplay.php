<?php
include 'login.php'
?>
<html>
<body style="background-color:lightgrey">

<head>
	<title> Reservations</title>
	<style> table, th, td {border: 1px solid black; border-collapse: collapse;}
				th, td {padding: 5px;text-align: center;}
			
caption{
	border: 1px solid black;
	font-size: 30;
}
</style>

</head>

<head>

</head>

<?php

	$allResult = mysql_query("SELECT * FROM cinplex") or die(mysql_error());
	
	$seatingArrang = array();
?>

<?php
	// Access form variables
	$cinema = $_POST['complex'];
	$cinplexID = $_POST['cinplexID'];
	$title = $_POST['title'];
	$theater = $_POST['theater'];
	$showtime = $_POST['showtime'];
	
	$seatchart = mysql_query("SELECT seat_chart FROM theater t where t.cinplex_id = {$cinplexID} and t.number = {$theater}") or die(mysql_error());
	$seatchart = mysql_fetch_array($seatchart);
	$seatchart = $seatchart['seat_chart'];
	$seatchart = explode("x",$seatchart);
	
	$numRows = $seatchart[0];
	$numCols = $seatchart[1];
		
	
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
				 //$reservedSeat = mysql_query (" Return a reserved seat if $j and $k match a seat row and column for that theater
				 // for that cinema, for that showtime");
					//if($reservedSeat is NOT NULL){
						//echo <th>< RESERVED </th>;
					//}
					//else{
						echo "<th><input type='button' value='Reserve\n Seat' style='height:50px; width:75px'/> </th>";
					//}
					
				
			};
			echo "</tr>";
		};
		echo"</table>";
	
?>

<div align="center">
<h3>Go Back</h3>

<form action="SeatResForm.php" method="POST">
<button>BACK</button>
</form>

</div>
</body>
</html>