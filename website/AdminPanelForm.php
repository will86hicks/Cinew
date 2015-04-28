<?php
//Author: Adam R. Mitchell (arm8759)
//Date: 4-26-2015
//Certification: I certify that everything in here is my own work with the assistants of my group members.
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
$user = $_SESSION["user"];
?>

<?php
	//This is a button that appears at the top of the AdminPanelForm.php screen and is used to RESET THE ENTIRE DATABASE by calling
	//"source nwc.create;" and "source nwc.load;" which will remove any changes that have been made to the database and re-initiate all data
	//to the base hard coded data.
	echo 
		"<br><br><form action='' method='POST'>
		<button class='button6' type='submit' align='center' value='reload_database' name='reloaded_database'>
		***************************<br>
		RELOAD DATABASE<br>
		***************************</button></form>";
		
	if(isset($_POST['reloaded_database']))
	{
		exec("mysql -u groupK -p cs4601_groupK --password=groupKpass < loadDB.sql");
		exec("mysql -u groupK -p cs4601_groupK --password=tFKslrSM < loadDB.sql");
		echo"<b>********DATABASE HAS RELOADED!*********</b>";

	}

?>

<html>
<body>

<head>
<title> 
Admin Panel
</title>
</head>

<body style="background-color:darkgrey">
<div align="center">

<h1><u>Admin Panel</u></h1>
<br><br>

<h2><u>Add to Database</u></h2>
<head>
<style>
.button6{
	background: darkred;
	font-size: 16px;
}
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}
.button4{
	background: orange;
	font-size: 24px;
	width: 150px;
	height: 80px
}
.form1 {
   display:inline;
   margin:0;
   padding:0;
}
.button5{
	background: orange;
	font-size: 24px;
	width: 150px;
	height: 80px
}
</head>
</style>
<?php
	//lists the tables you can add to in a row
	if($user == "Admin"){
		echo 
		"<form action='AdminAddToCinplex.php' class='form1'>
		<button class='button4' type='submit'>Add/Delete to Cinplex</button>
		</form>
		
		 <form action='AdminAddToMember.php' class='form1'>
		<button class='button4' type='submit'>Add to Member</button>
		</form>
		
		
		<form action='AdminAddToMovie.php' class='form1'>
		<button class='button4' type='submit'>Add to Movie</button>
		</form>
		
		<form action='AdminAddToReservation.php' class='form1'>
		<button class='button4' type='submit'>Add to Reservation</button>
		</form>
		
		<form action='AdminAddToTheater.php' class='form1'>
		<button class='button4' type='submit'>Add to Theater</button>
		</form>
		
		<form action='AdminAddToWatch.php' class='form1'>
		<button class='button4' type='submit'>Add to Watch</button>
		</form>
		
		<form action='AdminAddToReservationSeatAssignments.php' class='form1'>
		<button class='button5' type='submit'>Add Seat Assignments</button>
		</form>";
		
		echo "<h2><u>Delete from Database</u></h2>";
		
		//lists the tables you can delete in a row.
		echo 
		"<form action='AdminDeleteFromCinplex.php' class='form1'>
		<button class='button4' type='submit'>Delete From Cinplex</button>
		</form>
		
		 <form action='AdminDeleteFromMember.php' class='form1'>
		<button class='button4' type='submit'>Delete From Member</button>
		</form>
		
		<form action='AdminDeleteFromMembership.php' class='form1'>
		<button class='button4' type='submit'>Delete From Membership</button>
		</form>
		
		<form action='AdminDeleteFromMovie.php' class='form1'>
		<button class='button4' type='submit'>Delete From Movie</button>
		</form>
		
		<form action='AdminDeleteFromReservation.php' class='form1'>
		<button class='button4' type='submit'>Delete From Reservation</button>
		</form>
		
		<form action='AdminDeleteFromTheater.php' class='form1'>
		<button class='button4' type='submit'>Delete From Theater</button>
		</form>
		
		<form action='AdminDeleteFromWatch.php' class='form1'>
		<button class='button4' type='submit'>Delete From Watch</button>
		</form>
		
		<form action='AdminDeleteFromPlay.php' class='form1'>
		<button class='button4' type='submit'>Delete From Play Table</button>
		</form>
		
		<form action='AdminDeleteFromReservationSeatAssignments.php' class='form1'>
		<button class='button5' type='submit'>Delete Seat Assignments</button>
		</form>";
	}
?>
<?php
	//back button that shows up regardless
	echo 
		"<br><form action='StartPage.php'><br><br>
		<button class='button2' type='submit'>Back</button>
		</form>";
?>
</div>
</body>
</html>