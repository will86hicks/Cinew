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
Movie Viewage History
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


<h1>MOVIE VIEWAGE HISTORY</h1>
<br><br>
<form action="MovieViewingHistory.php" method="POST">

<h3>Select Account or current Membership:</h3><br>
<select name="chosenSelection">
    <option value="allMembers">All members</option>
<?php
	echo"<option value='{$ID}'>{$user}</option>";
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