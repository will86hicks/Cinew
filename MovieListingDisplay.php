<?php
include 'login.php'
?>


<html>
<body style="background-color:lightgrey">

<head>
<title> 
Movie Display
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
    text-align: left;
}
</style>
</head>

<?php
    $movieResult = mysql_query("SELECT * FROM play P,cinplex C WHERE P.addr = C.addr") or die(mysql_error());
	$cinemaResult = mysql_query("SELECT * FROM cinplex") or die(mysql_error());
	$allResult = mysql_query("SELECT * FROM cinplex") or die(mysql_error());
?>

<?php
	// Access form variables
	$cinema = $_POST['complexes'];
	if($cinema != "all"){
		echo
		"<table style='width:50%'>
			<caption>{$cinema}</caption>
			<tr>
				<th>Movie</th>
				<th>Theater</th>
				<th>Showtime</th>
			</tr>";
		while($row = mysql_fetch_array($movieResult)){
			echo
			"<tr>
				<th>{$row['title']}</th>
				<th>{$row['t_num']}</th>
				<th>{$row['time']}</th>
			<tr>";
		}
		echo"</table>";
	}else{
		echo"all";
	}
?>

<div align="center">
<h3>Go Back</h3>

<form action="MovieListing.php" method="POST">
<button>BACK</button>
</form>

</div>
</body>
</html>