<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>


<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
$user = $_SESSION["user"];
$id = $_SESSION["ID"];
?>

<html>
<body>

<head>
<title> 
Welcome!
</title>
</head>

<body style="background-color:darkgrey">
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
		"<form action='MovieHistory.php'>
		<button class='button1' type='submit'>View History</button>
		</form>";
	}
	else if($user == "Employee"){
		echo 
		"<form action='MovieListing.php'>
		<button class='button1' type='submit'>Movie Listings</button>
		</form>";
		
		echo 
		"<form action='EmployeeScheduleMovieForm.php'>
		<button class='button3' type='submit'>Schedule Movie</button>
		</form>";
	}
	else{
		echo 
		"<form action='MovieListing.php'>
		<button class='button1' type='submit'>Movie Listings</button>
		</form>";
		
		echo 
		"<form action='MovieHistory.php'>
		<button class='button1' type='submit'>View History</button>
		</form>";
		
		//$curious = mysql_query("SELECT DISTINCT MEM.prim_member FROM membership MEM, member M
		//											WHERE MEM.prim_member = M.id
		//											AND M.membership_acct = MEM.acct
		//											AND M.id = {$id}");
													
		
		$primMember = mysql_query("SELECT DISTINCT M.id FROM membership MEM, member M WHERE M.id = MEM.prim_member
										AND M.membership_acct = MEM.acct
										AND MEM.prim_member = M.id
										AND M.id = {$id}");
		$x = mysql_fetch_array($primMember);
		$y = $x[0];
		if($y == $id)
		{
			echo 
			"<form action='addDependent.php'>
			<button class='button1' type='submit'>Add Dependent</button>
			</form>";
			
			echo 
			"<form action='PrimeMemberPage.php'>
			<button class='button1' type='submit'>Edit Account</button>
			</form>";
		}
	}
?>

</div>
</body>
</html>