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
			<caption>ALL RESERVATIONS</caption>
			<tr>
				<th> </th>
				<th> Reservation Id</th>
				<th>Cineplex Id</th>
				<th>Theater</th>
				<th>Movie</th>
				<th>Showtime</th>
				<th>Member Id</th>
				<th>Account Id</th>
			
			</tr>
			


<?php
$allReservations= mysql_query("SELECT * FROM reservation");

//goes in the while loop    <!--<input type='hidden' value= '{$row['membership_acct']}' name= 'acct'> -->
while($row = mysql_fetch_array($allReservations)){
	echo "<tr> 
				<th>
					<form action= 'AdminResult_DeleteFromReservation.php' method= 'POST'>
						<button type = 'submit'  value = '{$row['id']}' name = 'res_id'>Delete Reservation</button>
						
					</form>
				</th>
					
				</th>
				<th> {$row['id']}</th>
				<th> {$row['cinplex']}</th>
				<th> {$row['theater']}</th>
				<th> {$row['movie']}</th>
				<th> {$row['date_time']}</th>
				<th> {$row['member_id']}</th>
				<th> {$row['acct']}</th>

			</tr>";
}
?>

</table>

<br><br>

<!--Back Button-->
<form action="AdminPanelForm.php" method="POST">
<h3>Go Back</h3>
<button>BACK</button>
</form>

</body>
</html>