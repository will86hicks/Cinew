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
$ID = $_SESSION["ID"];
?>

<html>
<body style="background-color:lightgrey">

<head>
<title> 
Seat Reservation
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
	$cinema = $_POST['cinema'];
	$cinemaID = $_POST['cinemaID'];
	$theaterID = $_POST['theaterID'];
	$movieTitle = $_POST['movieTitle'];
	$showTime = $_POST['showtime'];
	$movieID = $_POST['movieID'];
	$test = $_POST['check_list'];
	
?>

<div align="center">

<?php

$findAge = mysql_query("select age from member where id = {$ID}") or die(mysql_error());
$findAge = mysql_fetch_array($findAge);

$findRating = mysql_query("select rating from movie where title = '{$movieTitle}'") or die(mysql_error());
$findRating = mysql_fetch_array($findRating);

$findMembership = mysql_query("select membership_acct from member where id = {$ID}") or die(mysql_error());
$findMembership = mysql_fetch_array($findMembership);

$countOfResMembers = mysql_query("select count(RSA.reserv_id) as num from reservation R,res_seat_assignments RSA where R.acct = {$findMembership['membership_acct']} 
																																	AND R.cinplex = {$cinemaID} 
																																	AND R.theater = {$theaterID} 
																																	AND R.movie = '{$movieTitle}'
																																	AND R.date_time = '{$showTime}'
																																	AND RSA.reserv_id = R.id") or die(mysql_error());
$countOfResMembers = mysql_fetch_array($countOfResMembers);

$countOfMembers = mysql_query("select count(*) as num from member where membership_acct = {$findMembership['membership_acct']}") or die(mysql_error());
$countOfMembers = mysql_fetch_array($countOfMembers);

$sum = 0;
foreach($_POST['check_list'] as $selected){
	$sum+= 1;
}

$reserveID = mysql_query("select count(*) as num from reservation") or die(mysql_error());
$reserveID = mysql_fetch_array($reserveID);
$reserveID = $reserveID['num'] + 1;

if($countOfResMembers['num'] == $countOfMembers['num']){
	echo "<h3><u>Number of Reservations at Maximum Capacity</u></h3>";
}else if($sum > $countOfMembers['num']){
	echo "<h3><u>Cannot Reserve more seats than members on Account!</u></h3>";
}else if($findRating['rating'] == 'PG-13'){
	if($findAge['age'] < 13){
		echo "<h3><u>{$user} you are under-aged for this movie!</u></h3>";
	}else{
		echo "<h3><u>Scheduled Reservation for {$movieTitle} at {$cinema} for {$showTime}</u></h3>";
		$sqlInsertReservation = "INSERT INTO reservation".
									"(cinplex,theater,movie,date_time,member_id,acct) ".
									"VALUES('$cinemaID','$theaterID','$movieTitle','$showTime','$ID','{$findMembership['membership_acct']}')";
		$query = mysql_query($sqlInsertReservation) or die(mysql_error());
		
		foreach($_POST['check_list'] as $selected){
			$sqlInsertRes_Seat_Assignments = "INSERT INTO res_seat_assignments".
														"(reserv_id,seat_no) ".
														"VALUES('$reserveID','$selected')";
			$query = mysql_query($sqlInsertRes_Seat_Assignments) or die(mysql_error());
		}
		
		$watchCheck = mysql_query("select * from watch where member_id = {$ID} AND acct = {$findMembership['membership_acct']} AND movie_id = {$movieID}") or die(mysql_error());
		$watchCheck = mysql_fetch_array($watchCheck);
		if($watchCheck == null){
			$sqlWatch = "INSERT INTO watch".
														"(member_id,acct,movie_id) ".
														"VALUES('$ID','{$findMembership['membership_acct']}','$movieID')";
			$query = mysql_query($sqlWatch) or die(mysql_error());
		}
	}
}else if($findRating['rating'] == 'R'){
	if($findAge['age'] < 17){
		echo"<h3><u>{$user} you are under-aged for this movie!</u></h3>";
	}else{
		echo "<h3><u>Scheduled Reservation for {$movieTitle} at {$cinema} for {$showTime}</u></h3>";
		$sqlInsertReservation = "INSERT INTO reservation".
									"(cinplex,theater,movie,date_time,member_id,acct) ".
									"VALUES('$cinemaID','$theaterID','$movieTitle','$showTime','$ID','{$findMembership['membership_acct']}')";
		$query = mysql_query($sqlInsertReservation) or die(mysql_error());
		
		foreach($_POST['check_list'] as $selected){
			$sqlInsertRes_Seat_Assignments = "INSERT INTO res_seat_assignments".
														"(reserv_id,seat_no) ".
														"VALUES('$reserveID','$selected')";
			$query = mysql_query($sqlInsertRes_Seat_Assignments) or die(mysql_error());
		}
		$sqlWatch = "INSERT INTO watch".
														"(member_id,acct,movie_id) ".
														"VALUES('$ID','{$findMembership['membership_acct']}','$movieID')";
		$query = mysql_query($sqlWatch) or die(mysql_error());
	}
}else{
	echo "<h3><u>Scheduled Reservation for {$movieTitle} at {$cinema} for {$showTime}</u></h3>";
	$sqlInsertReservation = "INSERT INTO reservation".
								"(cinplex,theater,movie,date_time,member_id,acct) ".
								"VALUES('$cinemaID','$theaterID','$movieTitle','$showTime','$ID','{$findMembership['membership_acct']}')";
	$query = mysql_query($sqlInsertReservation) or die(mysql_error());
	
	foreach($_POST['check_list'] as $selected){
		$sqlInsertRes_Seat_Assignments = "INSERT INTO res_seat_assignments".
													"(reserv_id,seat_no) ".
													"VALUES('$reserveID','$selected')";
		$query = mysql_query($sqlInsertRes_Seat_Assignments) or die(mysql_error());
	}
	$sqlWatch = "INSERT INTO watch".
														"(member_id,acct,movie_id) ".
														"VALUES('$ID','{$findMembership['membership_acct']}','$movieID')";
		$query = mysql_query($sqlWatch) or die(mysql_error());
}
?>

<h3>Go Back</h3>

<form action="MovieListing.php">
<button>BACK</button>
</form>

</div>
</body>
</html>