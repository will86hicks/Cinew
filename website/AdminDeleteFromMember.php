<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
$user = $_SESSION["user"];
?>

<html>
<body style="background-color:lightgrey">

<head>
	<title> Members</title>
	<style> table, th, td {border: 1px solid black; border-collapse: collapse;}
				th, td {padding: 5px;text-align: center;}
			
caption{
	border: 1px solid black;
	font-size: 30;
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
					<form action= 'Admin_Result_DeleteFromMember.php' method= 'POST'><button type = 'submit' name = 'member_id' value = '{$row['id']}'>Delete Member</button></th>
					
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

<div style="text-align:center">
	<form action = "AdminDeleteFromMember.php">
		<button type = "submit" >BACK</button>
	</form>
</div>

</body>
</html>