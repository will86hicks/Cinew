<?php
// Jarred A Wynan - jaw4848
//Date:				4-24-15
//Certification: 	I, Jarred Wynan, hereby state that this document is my work and only my work.

include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>

<html>
<body>

<head>
<title> 
Add Movie
</title>
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
input, ::-webkit-input-placeholder,select{
	background: lightblue;
	color: yellow;
}
</style>
</head>

<div align="center">
<body style="background-color:darkgrey">
<h2>ADD Movie</h2>
<br>

<form action="AdminAddToMovieSubmit.php" method="POST">
Movie Title:<br><input type="input" name="movieTitle" placeholder="Furious7" required id ="title">
<br><br>
Description:<br><input type="input" name="description" required id="descr" required placeholder="Full-Fledged Action">
<br><br>
Runtime(min): <br><input type="input" name="runtime" required id="runtime" required placeholder="100">
<br><br>
Stars:<br><input type="input" name="stars" required id="stars" required placeholder="The Rok">
<br><br>
Rating: <br>
<select name="rating">
	<option value="">G</option>
	<option value="">PG</option>
	<option value="">PG-13</option>
	<option value="">R</option>
</select>
<br><br>
<!--ID(unique): <input type="input" name="id" required id="id" required placeholder="1111">
<br><br>-->

</select-->
<br><br>
<div align='center'> <button class ='button1' type="submit">Add Movie</button>
</form>

<br><br><br>

<form action='AdminPanelForm.php'>
<div align='center'> <button class='button2'>Back</button> </div>
</form>

</div>
</body>
</html>