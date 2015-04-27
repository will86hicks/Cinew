<?php
	include "login.php";
?>

<html>

<body>

<?php


$q = strval($_GET['q']);
echo "<p> {$q}</p>";
$sql="SELECT * FROM cinplex WHERE name = '.$q.'";
$result = mysql_query($sql) or die(mysql_error());

$theaters = mysql_query("SELECT t.number FROM theater t, cinplex c WHERE c.name = '{$q}' AND c.id = t.cinplex_id") or die(mysql_error());

echo "<p>Theater Number: <br></p>";

echo "<select>Theater Number: <option value = ''></option>";
	
		while($row = mysql_fetch_array($theaters)){
			echo "<option value = '{$row['number']}'>{$row['number']}</option>";
		}
		

	echo "</select>";

?>
</body>
</html>