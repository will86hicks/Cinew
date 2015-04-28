<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>
<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>

<html>
<body>

<form action='AdminPanelForm.php'>
<button class='button2'>Back</button>
</form>

<head>
<title> 
Delete From Membership
</title>
</head>

<div align="center">
<body style="background-color:darkgrey">

<h1>DELETE MEMBERSHIP</h1>
<br>

<head>
<style>
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}
.button1{
	background: darkred;
	font-size: 16px;
	width: 150px;
	height: 50px
}
.background{
	font-size: 24px;
	background: lightblue;
}
table, th, td {
    border: 3px solid black;
    border-collapse: collapse;
	background: lightblue;
}
th, td {
    padding: 5px;
    text-align: center;
}
caption{
	font-size: 32px
}
.thicker{
	border: 3px solid black;
    border-collapse: collapse;
	background: lightgreen;
}
</head>
</style>
<?php
$membershipQuery = mysql_query("select * from membership") or die(mysql_error());
while($row = mysql_fetch_array($membershipQuery)){
	$member = mysql_query("select f_name,l_name from member where id = {$row['prim_member']}") or die(mysql_error());
	$member = mysql_fetch_array($member);
	echo
		"<table style='width:50%'>
			<caption><b>Membership {$row['acct']}</b></caption>
			<br><br>
			<tr>
				<th class='thicker'>Primary Member</th>
				<th class='thicker'>Start Date</th>
				<th class='thicker'>End Date</th>
				<th class='thicker'>Delete membership</th>
			</tr>
			<tr>
				<th>{$row['prim_member']} -- {$member['f_name']} {$member['l_name']}</th>
				<th>{$row['start_date']}</th>
				<th>{$row['end_date']}</th>
				<th>
					<br>
					<form action='' method='POST'>
					<input type='hidden' value='{$row['acct']}' name='acct'/>
					<button type='submit' class='button1' name='membership_button'>DELETE MEMBERSHIP</button>
					</form>
				</th>
			</tr>
			<tr>
				<th COLSPAN = 4 class='thicker'>Dependants</th>
			</tr>
			<tr>
				<th COLSPAN = 2 class='thicker'>ID</th>
				<th COLSPAN = 2 class='thicker'>Name</th>
			</tr>";
			$members = mysql_query("select f_name,l_name,id from member where membership_acct = {$row['acct']} 
																									AND f_name NOT IN(select f_name from member where id = {$row['prim_member']})") or die(mysql_error());
			$num_results = mysql_num_rows($members); 
			if($num_results > 0){
				while($row2 = mysql_fetch_array($members)){
					echo
					"<tr>
						<th COLSPAN = 2>{$row2['id']}</th>
						<th COLSPAN = 2>{$row2['f_name']} {$row2['l_name']}</th>
					</tr>";
				}
			}else{
			
				echo
				"<tr>
					<th COLSPAN = 2>Empty</th>
					<th COLSPAN = 2>Empty</th>
				</tr>";
			}
			"</table>";
}
?>
<?php
if(isset($_POST['membership_button']))
{
	if(!empty($_POST['acct']))
	{
		$sql = "Delete from member where membership_acct = {$_POST['acct']}";
		$query = mysql_query($sql) or die(mysql_error());
		
		$sql = "Delete from membership where acct = {$_POST['acct']}";
		$query = mysql_query($sql) or die(mysql_error());
		
		$_POST['acct'] = NULL;
		
		header("Refresh:0");
	}
}
?>
</div>
</body>
</html>