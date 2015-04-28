<?php
//Author:			Will Hicks
//Date:				4-26-15
//Certification: 	I, Will Hicks, hereby state that this document is my work and only my work.
	include "login.php";
?>

<html>

<body>

<?php


$c = intval($_GET['c']);
$t = intval($_GET['t']);
$m = intval($_GET['m']);

$showtimes = mysql_query("SELECT DISTINCT p.showtime FROM play p, movie m, cinplex c WHERE p.cinplex_id = {$c} AND 
													p.t_num = {$t} AND p.movie_id = {$m}") or die(mysql_error());
	
	if(mysql_num_rows($showtimes) == 0){
		echo "<option value = ''>No showtimes available</option>";
	}
	else{
		echo "<option value = ''>Select a Showtime</option>";
	
		while($row = mysql_fetch_array($showtimes)){
			echo "<option value = '{$row['showtime']}' >{$row['showtime']}</option>";

		}
	}
		

?>
</body>
</html>