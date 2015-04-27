



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
<body style="background-color:lightgrey">
<head>
	
	<script>
		function populateTheater(cinplex){
			var xmlhttp;

			//Reset all the drop down lists
			document.getElementById("theaterSelect").innerHTML = "<option>Select a Theater</option>";
			document.getElementById("movieSelect").innerHTML = "<option>Select a Movie</option>";
			document.getElementById("showtimeSelect").innerHTML = "<option>Select a Showtime</option>";
			
			
			if(cinplex == ""){
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
						//document.getElementById("txt").innerHTML =xmlhttp.responseText;
						document.getElementById("theaterSelect").innerHTML=xmlhttp.responseText;
					}
				}
			xmlhttp.open("GET", "getTheater.php?q=" + cinplex, true);
			xmlhttp.send();
			
		}
	}
	</script>
	
	<script>
		function populateMovie(){
			var xmlhttp;

			var c = document.getElementById('cinplex').value;
			var t = document.getElementById('theaterSelect').value;
			
			
			if(t == ""){
				document.getElementById("movieSelect").innerHTML = "<option>Select a Movie</option>";
				document.getElementById("showtimeSelect").innerHTML = "<option>Select a Showtime</option>";
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
						document.getElementById("movieSelect").innerHTML=xmlhttp.responseText;
					}
				}
				
			xmlhttp.open("GET", "getMovie.php?c=" + c + '&t=' + t, true);
			xmlhttp.send();
			
		}
	}
	</script>
	
		<script>
		function populateShowtime(){
			var xmlhttp;

			var c = document.getElementById('cinplex').value;
			var t = document.getElementById('theaterSelect').value;
			var m =  document.getElementById('movieSelect').value;
			
			document.getElementById("showtimeSelect").innerHTML= c + t;
			
			
			if(m == ""){
				document.getElementById("showtimeSelect").innerHTML = "";
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
						document.getElementById("showtimeSelect").innerHTML=xmlhttp.responseText;
					}
				}
				
			xmlhttp.open("GET", "getShowtime.php?c=" + c + '&t=' + t + '&m=' + m, true);
			xmlhttp.send();
			
		}
	}
	</script>
	

	
</head>

<h1 align = "center">Add to Reservation</h1>

<form action = "AdminResult_AddToReservation" method = "POST">
	
	Cinema Complex: 
	
	<select id = "cinplex" onchange = "populateTheater(this.value)" required>
			<option value ="">Select a Cineplex </option>
			<?php
				$result = mysql_query("SELECT c.name, c.id FROM cinplex c");
				
				while($row = mysql_fetch_array($result)){
					echo "<option value = '{$row['id']}' name = 'cinplex' > {$row['name']}</option>";
				}
						
			?>
	</select>
	
	<br><br>
	Theater:
	<select id = "theaterSelect" onchange = "populateMovie()" required>
		<option value = ''>Select a Theater</option>
		
	
	</select>
	<br><br>
	
	Movie:
	
	<select name = 'movie' id = "movieSelect" onchange = "populateShowtime()" required>
		<option value = ''>Select a Movie</option>
	</select>
	
	
	<br><br>
	
	Showtime: 
	<!--<p id = 'showtimeSelect'> text to be changed</p>-->
	<select name = 'showtime' id = "showtimeSelect" required >
		<option value = ''>Select a Showtime</option>
	</select>
	
	<br><br>
	Select a Member:
	<select name="member" required>
	<option value = ''></option>
	<?php
	
		$memberResult = mysql_query("SELECT * FROM member");
		
		while($row = mysql_fetch_array($memberResult)){
			echo "<option value='{$row['id']}'>{$row['f_name']} {$row['l_name']}</option>" ;
	}
	?>
	</select>

	<br><br>

	<button>Add Reservation</button>
</form>



<form action="AdminPanelForm.php" method="POST">
<h3>Go Back</h3>
<button>BACK</button>
</form>

<p id = 'txt' > down here</p>
</body>
</html>