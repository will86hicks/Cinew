



<?php
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
<head>
	<script>
		function foo(cinplex){
			var xmlhttp;

			if(cinplex == ""){
				//document.getElementById("demo").innerHTML = "";
				return;
			}
			else{
				
				if(window.XMLHttpRequest)
					{
						//document.getElementById("demo").innerHTML = "fuck yeah";
						xmlhttp = new XMLHttpRequest();
					}
				else
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
			
				xmlhttp.onreadystatechange = function(){
					
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{
						document.getElementById("demo").innerHTML=xmlhttp.responseText;
					}
				}
			xmlhttp.open("GET", "getCinplex.php?q=" + cinplex, true);
			xmlhttp.send();
			
			//document.getElementById("demo").innerHTML =cinplex;
		}
	}
	</script>
</head>

<h1 align = "center">Add to Reservation</h1>

<form action = "AdminResult_AddToReservation" method = "POST">
	Cinema Complex: <br>
	
	<select id = "cinplex" onchange = "foo(this.value)" >
			<option value ="">Select a Cineplex </option>
			<?php
				$result = mysql_query("SELECT c.name FROM cinplex c");
				
				while($row = mysql_fetch_array($result)){
					echo "<option value = '{$row['name']}'> {$row['name']}</option>";
				}
						
			?>
	</select>
	

	
	
	
	
	<p id = "demo"></p>
	<br><br>
	Showtime: <br><input type = "datetime" name = "showtime">


</form>
</body>
</html>