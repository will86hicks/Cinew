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
Admin Panel
</title>
</head>

<body style="background-color:lightgrey">
<div align="center">

<h1><u>Add to Cinplex</u></h1>
<head>
<style>
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
</head>
</style>


<?php
	if($user == "Admin"){
		//Display the name of each field that needs to be field out
		echo"<form action='AdminPanelForm.php' method='post'>
		Cinplex Name: <input type='text' name='name'><br>
		Cinplex Addr: <input type='text' name='addr'><br>
		Cinplex Phone #: <input type='text' name='phone'><br>
		Cinplex ID: <input type='text' name='id'><br>
		<input type='submit'>
		</form>";
		
		echo"<form action='StartPage.php'>
		<button class='button2' type='submit'>Back</button>
		</form>";
	}
	else{
		echo"<h1>Invalid Access! Not an admin</h1>";
		echo 
		"<form action='StartPage.php'>
		<button class='button2' type='submit'>Back</button>
		</form>";
	}
?>

</div>
</body>
</html>