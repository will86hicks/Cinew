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
    text-align: center;
}
caption{
	font-size: 48px
}
.button1{
	background: green;

}
.button2{
	background: red;
}
.button3{
	background: lightblue;
	width: 100px;
	height: 50px;
}
</style>
</head>

<?php
	$cinema = $_POST['complexes'];
	
	if($cinema != "all"){
		$complexQuery = mysql_query("select id from cinplex where name = '{$cinema}'") or die(mysql_error());
		$cinemaID = mysql_fetch_array($complexQuery);
	
		$movieResult = mysql_query("select Distinct M.title,P.t_num,P.showtime,M.id from cinplex C, play P,movie M where P.cinplex_id = {$cinemaID['id']} AND M.id = P.movie_id") or die(mysql_error());
	}else{
		$cinemaResult = mysql_query("SELECT * FROM cinplex") or die(mysql_error());
	}
?>
<div align="center">
<?php
	if($user == "Admin" || $user == "Guest" || $user == "Employee"){
		// Access form variables
		if($cinema != "all"){
			echo
			"<table style='width:50%'>
				<caption><b>{$cinema}</b></caption>
				<tr>
					<th>Movie</th>
					<th>Theater</th>
					<th>Showtime</th>
					<th>Reserve</th>
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
				$cinemaID = $row['id'];
				echo
				"<table style='width:50%'>
					<caption><b>{$row['name']}</b></caption>
					<tr>
						<th>Movie</th>
						<th>Theater</th>
						<th>Showtime</th>
					</tr>";
				$movieResult = mysql_query("select Distinct M.title,P.t_num,P.showtime,M.id from cinplex C, play P,movie M where P.cinplex_id = {$row['id']} AND M.id = P.movie_id") or die(mysql_error());
				$num_results = mysql_num_rows($movieResult); 
				if($num_results > 0){
					while($row = mysql_fetch_array($movieResult)){
					echo
						"<div align='center'>
						<tr>
							<th>{$row['title']}</th>
							<th>{$row['t_num']}</th>
							<th>{$row['showtime']}</th>
							</th>
						<tr>
						</div>";
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
	}else{
		// Access form variables
		if($cinema != "all"){
			echo
			"<table style='width:50%'>
				<caption><b>{$cinema}</b></caption>
				<tr>
					<th>Movie</th>
					<th>Theater</th>
					<th>Showtime</th>
					<th>Reserve</th>
				</tr>";
			$num_results = mysql_num_rows($movieResult); 
				if($num_results > 0){
					while($row = mysql_fetch_array($movieResult)){
						echo
						"<tr>
							<th>{$row['title']}</th>
							<th>{$row['t_num']}</th>
							<th>{$row['showtime']}</th>
							<th>
							<form action='SeatResDisplay.php' method='POST'>
							<input type='hidden' value='{$cinema}' name='complex'/>
							<input type='hidden' value='{$cinemaID['id']}' name='cinplexID'/>
							<input type='hidden' value='{$row['title']}' name='title'/>
							<input type='hidden' value='{$row['t_num']}' name='theater'/>
							<input type='hidden' value='{$row['showtime']}' name='showtime'/>
							<input type='hidden' value='{$row['id']}' name='movieID'/>
							<input type='submit' value='Reserve' class='button3'/>
							</form>
							</th>
						<tr>";
					}
				}else{
					echo
					"<tr>
						<th>empty</th>
						<th>empty</th>
						<th>empty</th>
						<th>empty</th>
					<tr>";
				}
			echo"</table>";
		}else{
			while($row = mysql_fetch_array($cinemaResult)){
				$cinemaID = $row['id'];
				$cinema = $row['name'];
				echo
				"<table style='width:50%'>
					<caption><b>{$row['name']}</b></caption>
					<tr>
						<th>Movie</th>
						<th>Theater</th>
						<th>Showtime</th>
						<th>Reserve</th>
					</tr>";
				$movieResult = mysql_query("select Distinct M.title,P.t_num,P.showtime,M.id from cinplex C, play P,movie M where P.cinplex_id = {$row['id']} AND M.id = P.movie_id") or die(mysql_error());
				$num_results = mysql_num_rows($movieResult); 
				if($num_results > 0){
					while($row = mysql_fetch_array($movieResult)){
						echo
						"<div align='center'>
						<tr>
							<th>{$row['title']}</th>
							<th>{$row['t_num']}</th>
							<th>{$row['showtime']}</th>
							<th>
							<form action='SeatResDisplay.php' method='POST'>
							<input type='hidden' value='{$cinema}' name='complex'/>
							<input type='hidden' value='{$cinemaID}' name='cinplexID'/>
							<input type='hidden' value='{$row['title']}' name='title'/>
							<input type='hidden' value='{$row['t_num']}' name='theater'/>
							<input type='hidden' value='{$row['showtime']}' name='showtime'/>
							<input type='hidden' value='{$row['id']}' name='movieID'/>
							<input type='submit' value='Reserve' class='button3'/>
							</form>
							</th>
						<tr>
						</div>";
					}
				}else{
					echo
					"<tr>
						<th>empty</th>
						<th>empty</th>
						<th>empty</th>
						<th>empty</th>
					<tr>";
				}
				echo"</table>";
			}
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