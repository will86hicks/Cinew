<?php
// Name: 			Will Hicks
//Date:				4-24-15
//Certification: 	I, Jarred Wynan, hereby state that this document is my work and only my work.

include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
//$ID = $_SESSION["ID"];
?>



<html>

<head>
<style>
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}

.button1{
	background: green;
	font-size: 16px;
	width: 100px;
	height: 50px

}
select{  
	background: lightblue;
	color: yellow;
}
input{
	background: lightblue;
	font-size: 16px;
}
::-webkit-input-placeholder{
	color: yellow;
}
</style>

<script>
		function showSeats(resId){
			var xmlhttp;
			
			//Reset the seat table
			document.getElementById("seatTable").innerHTML = "";
			
			if(resId == ""){
				document.getElementById("seatTable").innerHTML = "";
				return;
			}
			
			else{
				if(window.XMLHttpRequest)
					{
						xmlhttp = new XMLHttpRequest();
					}
				else
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
			
				xmlhttp.onreadystatechange = function(){
					
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{
						document.getElementById("seatTable").innerHTML=xmlhttp.responseText;
					}
				}
			xmlhttp.open("GET", "getSeatResDisplayFromResId.php?resId=" + resId, true);
			xmlhttp.send();
			
		}
	}
	</script>
	
</head>

<body style="background-color:lightgrey">

<form action = "AdminResult_AddSeatsToReservation.php" method = "POST">
<div align = "center">
<h1>Select a Reservation to Add Seats To</h1>


<?php
$reservations = mysql_query("SELECT * FROM reservation");


echo "<select name = 'reservationId' id = 'reservationSelect' onchange = 'showSeats(this.value)'>
			<option value = ''>Select a reservation</option>";
			
			while($row = mysql_fetch_array($reservations)){
				echo "<option value = {$row['id']}>{$row['id']}</option>";
			}
			
		  echo "</select>";

?>


<div id = 'seatTable'>
</div><br>
<button class = "button1"> Add Seats</button>
</form>
<h3>Go Back</h3>

<form action="AdminPanelForm.php">
<button class='button2'>BACK</button>
</form>
</body>
</div>

</html>