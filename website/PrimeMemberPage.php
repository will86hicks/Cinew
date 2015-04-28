<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>


<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
$user = $_SESSION["user"];
$ID = $_SESSION['ID'];
echo "<div align='center'><h1><u>{$user}'s Account</u></h1></div>";
?>

<html>
<body>

<head>
<title> 
Edit Account
</title>
</head>

<body style="background-color:darkgrey">
<div align="center">


<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	background: lightgreen;
}
th, td {
    padding: 5px;
    text-align: center;
}
caption{
	border: 1px solid black;
	font-size: 30;
	background: lightgreen;
}
.button1{
	background: yellow;
	font-size: 24px;
	width: 150px;
	height: 80px
}
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}
.button3{
	background: lightblue;
	font-size: 14px;
	width: 100px;
	height: 40px
}
.button4{
	background: orange;
	font-size: 24px;
	width: 150px;
	height: 80px
}
</head>
</style>


<?php
$membership_account = mysql_query("select acct from membership where prim_member  = {$ID}") or die(mysql_error());
$membership_account = mysql_fetch_array($membership_account);

$members = mysql_query("select * from member where membership_acct = {$membership_account['acct']} 
																										AND id NOT IN (select id from member where id = {$ID})") or die(mysql_error());
echo
	"<table style='width:50%'>
		<caption><b>Dependants</b></caption>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Age</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Remove</th>
		</tr>";
while($row = mysql_fetch_array($members)){
	echo
	"
		<tr>
			<th>{$row['f_name']} {$row['l_name']}</th>
			<th>{$row['addr']}</th>
			<th>{$row['age']}</th>
			<th>{$row['email']}</th>
			<th>{$row['phone']}</th>
			<th>
				<form action='PrimeMemberPageSubmit.php' method='POST'>
				<input type='hidden' value='{$row['f_name']}' name='fname'/>
				<input type='hidden' value='{$row['l_name']}' name='lname'/>
				<input type='hidden' value='{$row['id']}' name='memberID'/>
				<br>
				<input type='submit' value='Remove' class='button3'/>
				</form>
			</th>
		</tr>
	";
}
echo"</table>";
?>
<br><br>
<form action='StartPage.php' method='POST'>
<input type='submit' value='Back' class='button2'/>
</form>

</div>
</body>
</html>