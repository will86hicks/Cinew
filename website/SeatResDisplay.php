<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>
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

	$numCols = $seatchart[0];
	$numRows = $seatchart[1];
	
	echo"<form action='ReserveSeatPHP.php' method='POST'>";
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
			$isReserve = mysql_query("select RSA.seat_no from res_seat_assignments RSA,reservation R where RSA.reserv_id = R.id AND R.cinplex = '{$cinemaID}' AND R.theater = '{$theater}' AND R.movie = '{$title}' AND R.date_time = '{$showtime}'") or die(mysql_error());
			$isReserve = mysql_fetch_array($isReserve);
			if($isReserve == null){
				echo
				"<th>
						<input type='checkbox' name='check_list[]' value='{$j}-{$k}'><br>Reserve Seat {$j}-{$k}<br>
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
						<input type='checkbox' name='check_list[]' value='{$j}-{$k}'><br>Reserve Seat {$j}-{$k}<br>
					</th>";
				}
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
	<button>Submit</button>
	</form>";
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