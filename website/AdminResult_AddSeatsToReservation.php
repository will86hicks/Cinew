<?php
// Name: 			Will Hicks
//Date:				4-24-15
//Certification: 	I, Will Hicks, hereby state that this document is my work and only my work.
include "login.php";
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";

$reserveID = $_POST['reservationId'];


echo "<div align = 'center'>";
if(!empty($_POST['check_list'])){
	echo "<h3><b> SUCCESSFULLY ADDED SEATS TO THE RESERVED SEATS TABLE</b></h2>";
	
foreach($_POST['check_list'] as $selected){
	
			
			$sqlInsertRes_Seat_Assignments = "INSERT INTO res_seat_assignments".
														"(reserv_id,seat_no) ".
														"VALUES('$reserveID','$selected')";
			$query = mysql_query($sqlInsertRes_Seat_Assignments) or die(mysql_error());
		}
}
else{
	echo "<h3><b> NO SEATS SELECTED</b></h3>";
}


echo "<h3>Go Back</h3><form action='AdminAddToReservationSeatAssignments.php'><button>BACK</button></form></div>";


?>



