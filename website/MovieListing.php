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
?>

<html>
<body style="background-color:darkgrey">

<div align="center">
<head>
<title> 
Movie Listings
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
	width: 100px;
	height: 50px
}
select{
	font-size: 16px;
	background: lightblue;
}
</head>
</style>

<h3>MOVIE LISTINGS</h3>
<form action="MovieListingDisplay.php" method="POST">

<?php
    $cinplexResult = mysql_query("SELECT * FROM cinplex") or die(mysql_error());
?>
Select a Complex:<br>
<select name="complexes">
  <option value="all">ALL COMPLEXES</option>
<?php
	while($row = mysql_fetch_array($cinplexResult)){
		echo "<option value='{$row['name']}'>{$row['name']}</option>" ;
	}
?>
</select>

<br><br>
<button type="submit" class="button1">Select Cinema</button>
</form>

<form action="StartPage.php" method="POST">
<h3>Go Back</h3>
<button class="button2">BACK</button>
</div>
</body>
</html>