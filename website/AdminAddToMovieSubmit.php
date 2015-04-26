<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
//$ID = $_SESSION["ID"];
?>


<html>
<body>

<head>
<title> 
Movie Added
</title>
</head>
<body style="background-color:lightgrey">


<?php 
// Access form variables
$movieTitle = $_POST['movieTitle'];
$description = $_POST['description'];
$runtime = $_POST['runtime'];
$rating = $_POST['rating'];
$stars = $_POST['stars'];
//$id = $_POST['id'];

echo "<p>$movieTitle</p>";
$movieQuery = mysql_query("SELECT * 
							FROM movie M
    						WHERE M.title = '{$movieTitle}'") or die(mysql_error()); //"AND
								  //M.descr = '{$description}'") or die(mysql_error());


if (mysql_num_rows($movieQuery) != 0){
	echo "<div align=center><h2>Movie already Exists, Movie was not added to the database</h2>";
} 
else { 
//create a new movie 
$sql = "INSERT INTO movie (title,descr,runtime,rating,stars)
       VALUES('$movieTitle','$description','$runtime','$rating','$stars')";
	   
		$query = mysql_query($sql) or die(mysql_error()); 
		echo"<div align=center><h2>Movie Added</h2>";
 } 
?>

<br><br><br><br>

<div align="center">
<h3>Redirecting...</h3>
<meta http-equiv="refresh" content="6; url=AdminAddToMovie.php"/>
</div>
</body>
</html>