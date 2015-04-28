<?php
// Jarred A Wynan - jaw4848
//Date:				4-28-15
//Certification: 	I, Jarred Wynan, hereby state that this document is my work and only my work.

include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>


<html>
<body style="background-color:lightgrey">

<head>
<title> 
List of Plays
</title>
</head>

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
caption{
	font-size: 48px
}
</style>
</head>

<div align="center">
<?php
echo "<table style='width:50%'><tr>
	  <th>Delete</>
	  <th>Theater</th>
	  <th>Cinema</th>
	  <th>ShowTime</th>
	  <th>Movie</th>
	  </tr>";
	  
$playResult = mysql_query("SELECT *
								FROM play P") or die(mysql_error());
											
$num_results = mysql_num_rows($playResult); 
if($num_results > 0){
	while($row = mysql_fetch_array($playResult)){
		$cinName = mysql_query("SELECT DISTINCT C.name FROM cinplex C WHERE C.id = {$row['cinplex_id']}") or die(mysql_error());
		$x = mysql_fetch_array($cinName);
		$y = $x[0];
		
		$movName = mysql_query("SELECT DISTINCT M.title FROM movie M WHERE M.id = {$row['movie_id']}") or die(mysql_error());
		$a = mysql_fetch_array($movName);
		$b = $a[0];
		echo
		"<tr>
		<th><form action= 'AdminDeleteFromPlaySubmit.php' method= 'POST'> 
				<button type = 'submit'  value = '{$row['t_num']}' name = 't_num'>Remove Play</button> 
				<input type='hidden' value= '{$row['showtime']}' name= 'showtime'>
				<input type='hidden' value= '{$row['cinplex_id']}' name= 'cinplex_id'>
				<input type='hidden' value= '{$row['movie_id']}' name= 'movie_id'>
		</form> </th>
		<th>{$row['t_num']}</th>
		<th>{$y}</th>
		<th>{$row['showtime']}</th>
		<th>{$b}</th>
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
	<tr>";
}
echo"</table>";
?>

<h3 >Go Back</h3>
<form action="AdminPanelForm.php" method="POST">
<button>BACK</button>
</form>

</div>
</body>
</html>