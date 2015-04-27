<?php
// Jarred A Wynan - jaw4848

include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>


<html>
<body style="background-color:lightgrey">

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

<?php
	$member = $_POST['id'];
	$movie = $_POST['movieID'];
	$account = mysql_query("SELECT M.membership_acct 
								FROM member M
								WHERE M.id = {$member}") or die(mysql_error());
	$account = mysql_fetch_array($account);
	$accountID = $account[0];
	echo "{$accountID}";
	
	
	$watchResult = mysql_query("SELECT W.member_id 
									FROM movie M, member MBR, watch W
									WHERE {$member} = W.member_id AND
										  {$movie} = W.movie_id") or die(mysql_error());
?>
<div align="center">
<?php 
	$num_results = mysql_num_rows($watchResult);
	if($num_results == 0){
		// add a watched movie to the watch table 
		$sql = "INSERT INTO watch (member_id,acct,movie_id)
		VALUES('$member','$accountID','$movie')";
	   
		$query = mysql_query($sql) or die(mysql_error()); 
		echo"<div align=center><h2>Watched Movie Added</h2>";
 } 
?>

<form action="AdminPanelForm.php" method="POST">
<h3>Go Back</h3>
<button>BACK</button>
</form>

</div>
</body>
</html>