<?php
// Jarred A Wynan - jaw4848
//Date:				4-25-15
//Certification: 	I, Jarred Wynan, hereby state that this document is my work and only my work.

include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>

<html>
<body style="background-color:darkgrey">

<div align="center">
<head>
<title> 
Member Listings
</title>
</head>

<head>
<style>
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}
.button1{
	background: green;
	font-size: 16px;
	width: 150px;
	height: 70px
}
.button4{
	background: lightblue;
	font-size: 16px;
	width: 80px;
	height: 40px
}
select{
	background: lightblue;
	color: darkblue;
}
</head>
</style>

<h3><u>Members watched movies</u></h3>

<form action="AdminAddToWatchSubmit.php" method="POST">
<?php
    $memberResult = mysql_query("SELECT * FROM member") or die(mysql_error());
?>
Select a Member:<br>
<select name="id">
<?php
	while($row = mysql_fetch_array($memberResult)){
		echo "<option value='{$row['id']}'>{$row['f_name']} {$row['l_name']}</option> ";
		     //"<input type='hidden' value= '{$row['membership_acct']}' name= 'acct'>";
 	} 
?>
</select>
		
<br><br>
<?php
    $movieResult = mysql_query("SELECT * FROM movie") or die(mysql_error());
?>
Select a Movie to add to Watched list:<br>
<select name="movieID">
<?php
	while($row = mysql_fetch_array($movieResult)){
		echo "<option value='{$row['id']}'>{$row['title']}</option>" ;
	}
?>
</select>
 
<br><br>
<button type="submit" class='button1'>Add Movie To Members Watched List</button>
</form>

<br><br><br>
<form action="AdminPanelForm.php" method="POST">
<h3>Go Back</h3>
<button class='button2'>BACK</button>
</div>
</body>
</html>