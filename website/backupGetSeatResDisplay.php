<?php
//Author:			Will Hicks
//Date:				4-26-15
//Certification: 	I, Will Hicks, hereby state that this document is my work and only my work.
?>

<?php
include 'login.php';
?>

<html>
<body style="background-color:darkgrey">

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
	background: lightblue;
	color: darkblue;
}
th, td {
	padding: 20px;
    text-align: center;
}
caption{
	border: 1px solid black;
	font-size: 30;
	background: lightblue;
}
.button1{
	background: green;
	width: 100px;
	height: 50px;

}
.button2{
	background: red;
	width: 100px;
	height: 50px;
}
.button3{
	background: lightblue;
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
	$cinemaID = $_POST['cinplexID'];
	//$title = $_POST['title'];
	$theater = $_POST['theater'];
	$showtime = $_POST['showtime'];
	$movieID = $_POST['movieID'];
	
	$seatchart = mysql_query("SELECT seat_chart FROM theater t where t.cinplex_id = {$cinemaID} and t.number = {$theater}") or die(mysql_error());
	$seatchart = mysql_fetch_array($seatchart);
	$seatchart = $seatchart['seat_chart'];
	$seatchart = explode("x",$seatchart);

	$numCols = $seatchart[0];
	$numRows = $seatchart[1];
	
	echo"<form action='ReserveSeatPHP.php' method='POST'>";
	echo
	"<table style='width:50%'>
		<caption>{$title} at the {$cinema} in Theater {$theater}</caption>
		<tr>
		<th></th>";
	


	for($i = 1; $i <= $numCols; $i++){
		echo "<th>C-{$i}</th>";
	};
	echo
		"</tr>";
		 
	$isReserve = mysql_query("select RSA.seat_no from res_seat_assignments RSA,reservation R where RSA.reserv_id = R.id AND R.cinplex = '{$cinemaID}' AND R.theater = '{$theater}' AND R.movie = '{$title}' AND R.date_time = '{$showtime}'") or die(mysql_error());
	$num_results = mysql_num_rows($isReserve);
	
	$seatNumArray = array();
	while($row = mysql_fetch_array($isReserve)){
		array_push($seatNumArray,"{$row['seat_no']}");
	}
	for($j = 1; $j <= $numRows; $j++){
		echo "<tr><th>R{$j}</th>";
		for($k = 1; $k <= $numCols; $k++){
			if(in_array("{$j}-{$k}", $seatNumArray)){
				echo
				"<td>
					<p><b>RESERVED</b></p>
				</td>";
			}else{
				echo
				"<td>
					<input type='checkbox' name='check_list[]' value='{$j}-{$k}' class='button3'><br><b>Reserve<br>Seat<br>{$j}-{$k}</b><br>
				</td>";
			}
		}
		echo "</tr>";
	}
	echo"</table>
	<input type='hidden' value='{$cinema}' name='cinema'/>
	<input type='hidden' value='{$cinemaID}' name='cinemaID'/>
	<input type='hidden' value='{$theater}' name='theaterID'/>
	<input type='hidden' value='{$showtime}' name='showtime'/>
	<input type='hidden' value='{$title}' name='movieTitle'/>
	<input type='hidden' value='{$movieID}' name='movieID'/>
	<br><br>
	<button class='button1'>Submit</button>
	</form>";
?>

<?php
echo
"<form action='MovieListing.php'>
<h3>Go Back</h3>
<button class='button2'>BACK</button>
</form>";
?>

</div>
</body>
</html>