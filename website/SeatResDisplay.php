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
	$cinema = $_POST['complex'];
	$cinemaID = $_POST['cinplexID'];
	$title = $_POST['title'];
	$theater = $_POST['theater'];
	$showtime = $_POST['showtime'];
	
	$seatchart = mysql_query("SELECT seat_chart FROM theater t where t.cinplex_id = {$cinemaID} and t.number = {$theater}") or die(mysql_error());
	$seatchart = mysql_fetch_array($seatchart);
	$seatchart = $seatchart['seat_chart'];
	$seatchart = explode("x",$seatchart);
	
	//$numRows = $seatchart[0];
	//$numCols = $seatchart[1];
	
	$numCols = $seatchart[0];
	$numRows = $seatchart[1];
	
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
		
	echo"Cinema:{$cinemaID}		Theater:{$theater}		movie:{$title}		showtime:{$showtime}";
	for($j = 1; $j <= $numRows; $j++){
		echo "<tr><th>Row-{$j}</th>";
		for($k = 1; $k <= $numCols; $k++){
			$isReserve = mysql_query("select RSA.seat_no from res_seat_assignments RSA,reservation R where RSA.reserv_id = R.id AND R.cinplex = '{$cinemaID}' AND R.theater = '{$theater}' AND R.movie = '{$title}' AND R.date_time = '{$showtime}'") or die(mysql_error());
			$isReserve = mysql_fetch_array($isReserve);
			if($isReserve == null){
				echo
				"<th>
						<form action='ReserveSeatPHP.php' method='POST'>
						<input type='button' value='Reserve\nSeat\n{$j}-{$k}' style='height:70px; width:75px'/>
						</form>
				</th>";
			}else{
				$isReserve = $isReserve['seat_no'];
				$isReserve = explode("-",$isReserve);
				$theRow = $isReserve[1]; 
				$theColumn = $isReserve[0];
				if($j == $theRow && $k == $theColumn){
				echo
				"<th>
					<p>RESERVED</p>
				</th>";
				}
				else{
					echo
					"<th>
						<form action='ReserveSeatPHP.php' method='POST'>
						<input type='button' value='Reserve\nSeat\n{$j}-{$k}' style='height:70px; width:75px'/>
						</form>
					</th>";
				}
			}
		}
		echo "</tr>";
	}
	echo"</table>";
?>

<?php
echo
"<h3>Go Back</h3>
<form action='MovieListing.php'>
<button>BACK</button>
</form>";
?>

</div>
</body>
</html>