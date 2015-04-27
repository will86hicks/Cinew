<?php
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