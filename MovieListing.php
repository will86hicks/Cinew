<?php
include 'login.php';
$complex = "";
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

<br><br><br>
<button type="submit">Select Cinema</button>
</form>

</div>
</body>
</html>