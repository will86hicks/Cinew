<?php
	include "login.php";
?>

<html>

<body>

<?php


$q = intval($_GET['q']);
//echo " <option>{$q}</option>";

//$theaters = mysql_query("SELECT t.number FROM theater t, cinplex c WHERE c.name = '{$q}' AND c.id = t.cinplex_id") or die(mysql_error());
$theaters = mysql_query("SELECT t.number from theater t WHERE  t.cinplex_id = {$q}") or die(mysql_error());
	if(mysql_num_rows($theaters) == 0){
		echo "<option value = ''>No Theaters</option>";
	
	}
	
	else{
		echo "<option value = ''>Select a Theater</option>";
	}
	
	while($row = mysql_fetch_array($theaters)){
		echo "<option value = '{$row['number']}'>{$row['number']}</option>";
		
	}
		

?>
</body>
</html>