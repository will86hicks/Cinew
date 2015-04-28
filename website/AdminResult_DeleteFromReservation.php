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
<body>



<?php

//Accessing the form variables
$resId = $_POST['res_id'];

												
												
//Deleting the reservation seat	

	mysql_query("DELETE FROM reservation WHERE id = {$resId}");
	if(mysql_affected_rows() !=0){
		echo "<p style= 'text-align:center'>Successfully Deleted Reservation</p>";
		
	}
	else{
		echo "<p style='text-align:center'>An error occurred when trying to delete the Reservation.  The reservation ID didn't match any existing reservations</p>";
	}

?>

<div style="text-align:center">
<form action = "AdminDeleteFromReservation.php">
	<button type = "submit" >Delete Another Reserved Seat</button>
</form>

<form action = "AdminPanelForm.php">
	<button type = "submit" style="text-align:center">Admin Panel</button>
</form>
</div>

</body>
</html>