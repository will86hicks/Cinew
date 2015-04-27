<?php
// Jarred A Wynan - jaw4848

include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>

<html>
<body style="background-color:lightgrey">

<div align="center">
<head>
<title> 
Member Listings
</title>
</head>


<h3>Member Listings</h3>

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
<button type="submit">Add Movie To Members Watched List</button>
</form>

<br><br><br>
<form action="AdminPanelForm.php" method="POST">
<h3>Go Back</h3>
<button>BACK</button>
</div>
</body>
</html>