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

$movies = mysql_query("SELECT DISTINCT m.title, m.id FROM play p, movie m WHERE p.cinplex_id = {$c} AND p.t_num = {$t} AND p.movie_id = m.id") or die(mysql_error());
	
	if(mysql_num_rows($movies) == 0){
		echo "<option value = ''>No movies playing</option>";
	}
	else{
		echo "<option value = ''>Select a Movie</option>";
	
		while($row = mysql_fetch_array($movies)){
			echo "<option value = '{$row['id']}' >{$row['title']}</option>";

		}
	}
		

?>
</body>
</html>