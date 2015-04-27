<?php
include 'login.php';

echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
?>

<html>
<body style="background-color:lightgrey">



<?php



//Accessing the form variable from AdminDeleteFromMember.php
$memberReserve = $_POST['memberId'];
$movie = $_POST['movieId'];
$showtime = $_POST['showtime'];
$cinplex = $_POST['cinplexId'];
$theater = $_POST['theater'];

//Find the accountId associated with the member.  This can't be passed as a hidden input when you're using a select element
$account = mysql_query("SELECT m.membership_acct FROM member m WHERE m.id = {$memberReserve}") or die(mysql_error());

if(mysql_num_rows($account) == 1){
	$account = mysql_fetch_array($account);
	$accountId = $account[0];
}
else{
	echo "<p>The query returned a member that has multiple accounts</p>";
}

//Find the movie name associated with the movie ID.  This can't be passed as a hidden input when you're using a select element
$movieResult = mysql_query("SELECT m.title FROM movie m WHERE m.id ={$movie}") or die(mysql_error());

if(mysql_num_rows($movieResult)== 1){
	$movieResult = mysql_fetch_array($movieResult);
	$movieName = $movieResult[0];
}
else{
	echo "<p>The query returned movies(plural) when it should have returned only one</p>";
}


if(mysql_query("INSERT INTO reservation (cinplex, theater, movie, date_time, member_id, acct) VALUES ('$cinplex', '$theater', '$movieName', '$showtime', '$memberReserve', '$accountId')")){
	echo "<h1 align = 'center'>Successfully Added Reservation</h1>";
}
else{
	echo "<p>Failed to insert</p>";
}
 

?>

<div style="text-align:center">
<form action = "AdminAddToReservation.php">
	<button type = "submit" >Add Another Reservation</button>
</form>

<form action = "AdminPanelForm.php">
	<button type = "submit" style="text-align:center">Admin Panel</button>
</form>
</div>

</body>
</html>