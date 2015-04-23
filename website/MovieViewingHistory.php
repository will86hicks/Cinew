<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>


<html>
<body style="background-color:lightgrey">

<head>
<title> 
Movie Viewing History
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
    text-align: center;
	font-size: 24px;
}
caption{
	font-size: 36px
}

.left{
	padding: 5px;
    text-align: left;
	font-size: 24px;
}

.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}
</style>
</head>

<div align="center">
<?php
	$selectedThis = $_POST['chosenSelection'];
	
	if($selectedThis != "allMembers"){
		$ID = $selectedThis;
		//find the membershipAcctnum
		$movieIDS = mysql_query("select title from watch W,movie M where W.member_id = '{$ID}' AND W.movie_id = M.id order by title") or die(mysql_error());
		echo
		"<table style='width:25%'>
			<caption><b>{$user}'s History</b></caption>
			<tr>
				<th>Viewed Movies</th>
			</tr>";
		while($row = mysql_fetch_array($movieIDS)){
			echo
				"<tr>
					<th class='left'><li>{$row['title']}</li></th>
				<tr>";
		}
		echo"</table>";
		
	}else{
			$ID = $_SESSION['ID'];
			$currentMembership = mysql_query("select acct from membership where prim_member = {$ID}") or die(mysql_error());
			$currentMembership = mysql_fetch_array($currentMembership);
			
			$membersOnMembership = mysql_fetch_array($currentMembership);
			echo"{$currentMembership['acct']}";
			//$members = mysql_query("select id from ") or die(mysql_error());
	}
?>

<form action="MovieHistory.php">
<h3>Go Back</h3>
<button class="button2">BACK</button>
</form>

</div>
</body>
</html>