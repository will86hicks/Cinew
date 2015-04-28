<?php
// Jarred A Wynan - jaw4848
//Date:				4-25-15
//Certification: 	I, Jarred Wynan, hereby state that this document is my work and only my work.

include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>


<html>
<body style="background-color:darkgrey">

<head>
<title> 
Movie Display
</title>
</head>

<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	background:lightgreen;
}
th, td {
    padding: 5px;
    text-align: left;
}
caption{
	font-size: 48px
	background:lightgreen;
}
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}

.button4{
	background: orange;
	font-size: 24px;
	width: 150px;
	height: 80px
}

.button1{
	background: green;
	font-size: 16px;
	width: 130px;
	height: 50px
}
.button3{
	background: lightblue;
	font-size: 16px;
	width: 100px;
	height: 50px
}
</style>
</head>

<div align="center">
<?php
echo "<table style='width:50%'><tr>
	  <th>Delete</>
	  <th>Movie</th>
	  <th>Description</th>
	  <th>Runtime</th>
	  <th>Rating</th>
	  <th>Stars</th>
	  </tr>";
	  
$movieResult = mysql_query("SELECT *
								FROM movie M") or die(mysql_error());
											
$num_results = mysql_num_rows($movieResult); 
if($num_results > 0){
	while($row = mysql_fetch_array($movieResult)){
		echo
		"<tr>
		<th><form action= 'AdminDeleteFromMovieSubmit.php' method= 'POST'> 
				<button type = 'submit'  value = '{$row['id']}' name = 'movieID' class='button3'>Delete Movie</button>  						  					
		</form> </th>

		<th>{$row['title']}</th>
		<th>{$row['descr']}</th>
		<th>{$row['runtime']}</th>
		<th>{$row['rating']}</th>
		<th>{$row['stars']}</th>
		<tr>";
	}
}
else{
	echo
	"<tr>
	<th>empty</th>
	<th>empty</th>
	<th>empty</th>
	<th>empty</th>
	<th>empty</th>
	<th>empty</th>
	<tr>";
}
echo"</table>";
?>

<h3 >Go Back</h3>
<form action="AdminPanelForm.php" method="POST">
<button class='button2'>BACK</button>
</form>

</div>
</body>
</html>