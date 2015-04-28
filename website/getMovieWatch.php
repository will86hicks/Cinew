<?php
//Author:			Jarred Wynan
//Date:				4-26-15
//Certification: 	I, Jarred Wynan, hereby state that this document is my work and only my work.
	
include "login.php";
?>

<html>

<body>

<?php


$memberID = intval($_GET['memberID']);


$movies = mysql_query("SELECT DISTINCT MOV.id, MOV.title
						FROM member MEM, movie MOV, watch W
						WHERE MEM.id = {$memberID} AND 
							  MEM.id = W.member_id AND
							  W.movie_id = MOV.id") or die(mysql_error());
							  
							  //p. = {$t} AND p.movie_id = m.id") or die(mysql_error());
	
	if(mysql_num_rows($movies) == 0){
		echo "<option value = ''>No movies watched</option>";
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