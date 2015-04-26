<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
$ID = $_SESSION["ID"];
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
$id = $_POST['id'];


$movieQuery = mysql_query("select * from movie where id = '{$id}'") or die(mysql_error());


if (mysql_num_rows($movieQuery) != 0){
	echo "Movie ID allready Exists, please use a unique ID to add a movie";
} 
else { 
//create a new movie 
$sql = "INSERT INTO movie (title,descr,runtime,rating,stars,id)
       VALUES('$movieTitle','$description','$runtime','$rating','$stars','$id')";
	   
		$query = mysql_query($sql) or die(mysql_error()); 
 } 
?>


<div align="center">
<h1>Movie Added</h1>
</div>

<br><br><br><br>

<div align="center">
<h3>Redirecting...</h3>
<!--<meta http-equiv="refresh" content="4"; url=AdminAddToMovie.php"/>-->
</div>
</body>
</html>