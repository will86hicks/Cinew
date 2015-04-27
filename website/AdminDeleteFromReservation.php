<?php
//Author:			Will Hicks
//Date:				4-26-15
//Certification: 	I, Will Hicks, hereby state that this document is my work and only my work.
include "login.php";

echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
?>

<html>
<body style="background-color:lightgrey">
<head>
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
					<form action= 'AdminResult_DeleteFromMember.php' method= 'POST'>
						<button type = 'submit'  value = '{$row['id']}' name = 'member_id'>Delete Member</button>
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

<!--Back Button-->
<form action="AdminPanelForm.php" method="POST">
<h3>Go Back</h3>
<button>BACK</button>
</form>

</body>
</html>