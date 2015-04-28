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
<body>

<head>
<title> 
Schedule Movie
</title>
</head>

<div align="center">

<body style="background-color:darkgrey">
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
.button3{
	background: lightblue;
	font-size: 16px;
	width: 100px;
	height: 50px
}
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
caption{
	font-size: 36px;
}
</head>
</style>

<?php
	$newMovieTitle = $_POST['title'];
	$newMovieDescr = $_POST['description'];
	$newMovieRuntime = $_POST['runtime'];
	$newMovieRating = $_POST['rating'];
	$newMovieStars = $_POST['stars'];
	
	$selectMovie = mysql_query("select id from movie where title = '{$newMovieTitle}'") or die(mysql_error());
	$selectMovie = mysql_fetch_array($selectMovie);
?>

<?php
	if($selectMovie == null){
		echo"<h3><u>Movie Created!</u></h3>";
		
		$sqlInsertMovie = "INSERT INTO movie".
									"(title,descr,runtime,rating,stars) ".
									"VALUES('$newMovieTitle','$newMovieDescr','$newMovieRuntime','$newMovieRating','newMovieStars')";
		$query = mysql_query($sqlInsertMovie) or die(mysql_error());
	}else{
		echo"<h3><u>Movie Already Exist!</u></h3>";
	}
?>


<form action="EmployeeScheduleMovieForm.php">
<button type="submit" class="button2">Back</button>
</form>

</div>
</body>
</html>