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
caption{
	font-size: 48px
}
</style>
</head>

<?php
	$cinema = $_POST['complexes'];
	
	if($cinema != "all"){
		$complexQuery = mysql_query("select id from cinplex where name = '{$cinema}'") or die(mysql_error());
		$row = mysql_fetch_array($complexQuery);
	
		$movieResult = mysql_query("select Distinct M.title,P.t_num,P.showtime from cinplex C, play P,movie M where P.cinplex_id = {$row['id']} AND M.id = P.movie_id") or die(mysql_error());
	}else{
		$cinemaResult = mysql_query("SELECT * FROM cinplex") or die(mysql_error());
	}
?>
<div align="center">
<?php
	// Access form variables
	if($cinema != "all"){
		echo
		"<table style='width:50%'>
			<caption><b>{$cinema}</b></caption>
			<tr>
				<th>Movie</th>
				<th>Theater</th>
				<th>Showtime</th>
			</tr>";
		$num_results = mysql_num_rows($movieResult); 
			if($num_results > 0){
				while($row = mysql_fetch_array($movieResult)){
				echo
					"<tr>
						<th>{$row['title']}</th>
						<th>{$row['t_num']}</th>
						<th>{$row['showtime']}</th>
					<tr>";
			}
			}else{
				echo
				"<tr>
					<th>empty</th>
					<th>empty</th>
					<th>empty</th>
				<tr>";
			}
		echo"</table>";
	}else{
		while($row = mysql_fetch_array($cinemaResult)){
			echo
			"<table style='width:50%'>
				<caption><b>{$row['name']}</b></caption>
				<tr>
					<th>Movie</th>
					<th>Theater</th>
					<th>Showtime</th>
				</tr>";
			$movieResult = mysql_query("select Distinct M.title,P.t_num,P.showtime from cinplex C, play P,movie M where P.cinplex_id = {$row['id']} AND M.id = P.movie_id") or die(mysql_error());
			$num_results = mysql_num_rows($movieResult); 
			if($num_results > 0){
				while($row = mysql_fetch_array($movieResult)){
				echo
					"<tr>
						<th>{$row['title']}</th>
						<th>{$row['t_num']}</th>
						<th>{$row['showtime']}</th>
					<tr>";
			}
			}else{
				echo
				"<tr>
					<th>empty</th>
					<th>empty</th>
					<th>empty</th>
				<tr>";
			}
			echo"</table>";
		}
	}
?>

<form action="MovieListing.php" method="POST">
<h3>Go Back</h3>
<button>BACK</button>
</form>

</div>
</body>
</html>