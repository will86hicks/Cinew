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
<body>

<head>
<title> 
Schedule Movie
</title>
</head>

<div align="center">

<body style="background-color:darkgrey">
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
.button3{
	background: lightblue;
	font-size: 16px;
	width: 100px;
	height: 50px
}
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}
.button1{
	background: green;
	font-size: 16px;
	width: 100px;
	height: 50px
}
caption{
	font-size: 36px;
}
</head>
</style>

<?php
	$showDay = $_POST['showDay'];
	$showTime = $_POST['showTime'];
	$showTime = $showDay .' '.$showTime;
	
	$theater = $_POST['theaterNum'];
	
	$cinemaID = $_POST['cinplexID'];
	$cinema = $_POST['complex'];
	
	$movieTitle = $_POST['movieTitle'];
	$movieID = $_POST['movieID'];
	
	$selectShowtime = mysql_query("select showtime from play where cinplex_id = {$cinemaID} AND t_num = {$theater} AND  '$showTime' IN (select showtime from theater);") or die(mysql_error());
	$selectShowtime = mysql_fetch_array($selectShowtime);																			
																								
?>

<?php
	if($selectShowtime == null){
		echo"<h3><u>{$movieTitle} Scheduled at {$cinema} Theater {$theater} at {$showTime}</u></h3>";
		$sqlInsertPlay = "INSERT INTO play".
									"(t_num,cinplex_id,showtime,movie_id) ".
									"VALUES('$theater','$cinemaID','$showTime','$movieID')";
		$query = mysql_query($sqlInsertPlay) or die(mysql_error());
	}else{
		echo"<h3><u>Cannot schedule a movie ontop of another movie!</u></h3>";
	}
?>


<p><b>You are being redirected!</b></p>
</div>
<meta http-equiv="refresh" content="2; url=EmployeeScheduleMovieForm.php"/>
</body>
</html>