<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>
<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
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
	$ID = $_POST['chosenSelection'];
	$user = mysql_query("select * from member where id = {$ID}") or die(mysql_error());
	$user = mysql_fetch_array($user);
	//find the membershipAcctnum
	$movieIDS = mysql_query("select title from watch W,movie M where W.member_id = '{$ID}' AND W.movie_id = M.id order by title") or die(mysql_error());
	$num_results = mysql_num_rows($movieIDS);
	if($num_results > 0){
		echo
		"<table style='width:25%'>
			<caption><b>{$user['f_name']} {$user['l_name']}'s History</b></caption>
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
		echo
		"<table style='width:25%'>
			<caption><b>{$user['f_name']} {$user['l_name']}'s History</b></caption>
			<tr>
				<th>Viewed Movies</th>
			</tr>";
		echo
			"<tr>
				<th>No Movie History</th>
			<tr>";
		echo"</table>";
	}
?>

<form action="MovieHistory.php">
<h3>Go Back</h3>
<button class="button2">BACK</button>
</form>

</div>
</body>
</html>