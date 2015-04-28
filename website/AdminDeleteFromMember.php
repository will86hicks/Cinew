<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>

<html>
<div align='center'>
<h1><u>Delete From Member</u></h1>
<body style="background-color:darkgrey">

<head>
	<title> Members</title>

	<style> 
table, th, td {
	border: 1px solid black; border-collapse: collapse;
	background: lightgreen;
}
th, td {
	padding: 5px;text-align: center;
}
			
caption{
	border: 1px solid black;
	font-size: 30;
	background: lightgreen;
}

.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}

.button4{
	background: orange;
	font-size: 24px;
	width: 150px;
	height: 80px
}

.button3{
	background: lightblue;
	font-size: 16px;
	width: 100px;
	height: 50px
}
</style>
</head>

<table style='width:50%'>
			<caption>ALL MEMBERS</caption>
			<tr>
				<th> </th>
				<th> id </th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Address</th>
				<th>Age</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th> Account Number</th>
			
			</tr>
			


<?php
$allmembers = mysql_query("SELECT * FROM member");

while($row = mysql_fetch_array($allmembers)){
	echo "<tr> 
				<th>
					<form action= 'AdminResult_DeleteFromMember.php' method= 'POST'>
						<button type = 'submit'  value = '{$row['id']}' name = 'member_id' class='button3'>Delete Member</button>
						<input type='hidden' value= '{$row['membership_acct']}' name= 'acct'>
					</form>
				</th>
					
				</th>
				<th> {$row['id']}</th>
				<th> {$row['f_name']}</th>
				<th> {$row['l_name']}</th>
				<th> {$row['addr']}</th>
				<th> {$row['age']}</th>
				<th> {$row['email']}</th>
				<th> {$row['phone']}</th>
				<th> {$row['membership_acct']}</th>
			</tr>";
}
?>

</table>

<br><br>
	<form action = "AdminPanelForm.php">
		<button type = "submit" class='button2'>BACK</button>
	</form>
</div>

</body>
</html>