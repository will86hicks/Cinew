<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
$user = $_SESSION["user"];
?>

<html>
<body>

<head>
<title> 
Welcome!
</title>
</head>

<body style="background-color:lightgrey">
<div align="center">
<h1>Babadook Database</h1>

<head>
<style>
.button1{
	background: yellow;
	font-size: 24px;
	width: 150px;
	height: 80px
}
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}
.button3{
	background: lightblue;
	font-size: 24px;
	width: 150px;
	height: 80px
}
.button4{
	background: orange;
	font-size: 24px;
	width: 150px;
	height: 80px
}
</head>
</style>


<?php
	if($user == "Admin"){
		echo 
		"<form action='MovieListing.php'>
		<button class='button1' type='submit'>Movie Listings</button>
		</form>";
		
		echo 
		"<form action='AdminPanelForm.php'>
		<button class='button4' type='submit'>Admin Panel</button>
		</form>";
		
		echo 
		"<form action=''>
		<button class='button3' type='submit'>Schedule Movie</button>
		</form>";
	}
	else if($user == "Guest"){
		echo 
		"<form action='MovieListing.php'>
		<button class='button1' type='submit'>Movie Listings</button>
		</form>";
		
		echo 
		"<form action=''>
		<button class='button1' type='submit'>View History</button>
		</form>";
	}
	else if($user == "Employee"){
		echo 
		"<form action='MovieListing.php'>
		<button class='button1' type='submit'>Movie Listings</button>
		</form>";
		
		echo 
		"<form action=''>
		<button class='button3' type='submit'>Schedule Movie</button>
		</form>";
	}
	else{
		echo 
		"<form action='MovieListing.php'>
		<button class='button1' type='submit'>Movie Listings</button>
		</form>";
		
		echo 
		"<form action=''>
		<button class='button1' type='submit'>View History</button>
		</form>";
		
		echo 
		"<form action='addDependent.php'>
		<button class='button1' type='submit'>Add Dependent</button>
		</form>";
		
		echo 
		"<form action=''>
		<button class='button1' type='submit'>Seating Reservation</button>
		</form>";
	}
?>

</div>
</body>
</html>