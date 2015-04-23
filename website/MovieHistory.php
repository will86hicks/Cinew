<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
$ID = $_SESSION["ID"];
?>
<html>
<body style="background-color:lightgrey">

<div align="center">
<head>
<title> 
Movie Viewing History
</title>
</head>

<head>
<style>
.button1{
	background: yellow;
	font-size: 24px;
	width: 150px;
	height: 80px
}

select{
	background: turquoise;
	font-size: 24px;
}

.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}
</style>
</head>


<h1><u>MOVIE VIEWING HISTORY</u></h1>
<br><br>
<form action="MovieViewingHistory.php" method="POST">

<?php
$Membership = mysql_query("select acct from membership") or die(mysql_error());
?>
<h3>Select All Members or Current Member:</h3><br>
<select name="chosenSelection">
<?php
	while($row = mysql_fetch_array($Membership)){
		echo"<optgroup label='Membership: {$row['acct']}'>";
		$members = mysql_query("select f_name,l_name,id from member where membership_acct = {$row['acct']}") or die(mysql_error());
		while($row2 = mysql_fetch_array($members)){
			echo"<option value='{$row2['id']}'>ID: {$row2['id']} Name: {$row2['f_name']} {$row2['l_name']}</option>";
		}
	}
?>
</select>

<br><br><br><br><br>
<button type="submit" class="button1">Get History</button>
</form>

<br><br><br>
<form action="StartPage.php" method="POST">
<h3>Go Back</h3>
<button class="button2">BACK</button>
</div>
</body>
</html>