<?php
include "login.php";

echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
?>

<html>
<body>

<h1 align = "center">Add to Reservation</h1>

<form action = "AdminResult_AddToReservation" method = "POST">
	Cinema Complex: <br><select id = "name = "cinplex_name">
			<?php
				$result = mysql_query("SELECT c.name FROM cinplex c");
				
				while($row = mysql_fetch_array($result)){
					echo "<option value = '{$row['name']}'> {$row['name']}</option>";
				}
						
			?>
	</select>
	<br><br>
	Showtime: <br><input type = "datetime" name = "showtime">


</form>
</body>
</html>