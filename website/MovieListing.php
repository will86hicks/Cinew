<?php
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
Movie Listings
</title>
</head>



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
<button type="submit">Select Cinema</button>
</form>

<br><br><br>
<form action="StartPage.php" method="POST">
<h3>Go Back</h3>
<button>BACK</button>
</div>
</body>
</html>