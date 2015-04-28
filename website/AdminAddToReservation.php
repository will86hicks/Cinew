



<?php
//Author:			Will Hicks
//Date:				4-26-15
//Certification: 	I, Will Hicks, hereby state that this document is my work and only my work.


include "login.php";
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
?>

</title>
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
</head>

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
			
			//Reset the seat table
			document.getElementById("seatTable").innerHTML = "";
			
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
			
			document.getElementById("showtimeSelect").innerHTML = "<option>Select a Showtime</option>";
			
			//Reset the seat table
			document.getElementById("seatTable").innerHTML = "";
			
			
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
			
			//Reset the seat table
			document.getElementById("seatTable").innerHTML = "";
			
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
	
	<script>
		function populateSeatTable(){
			var xmlhttp;

			var cinplexID = document.getElementById('cinplex').value;
			var theater = document.getElementById('theaterSelect').value;
			var movieID =  document.getElementById('movieSelect').value;
			var showtime =  document.getElementById('showtimeSelect').value;
			//var member =  document.getElementById('memberSelect').value;
			
			//document.getElementById("seatTable").innerHTML = "entered the function";
			
			if(showtime == ""){
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
				
			xmlhttp.open("GET", "getSeatResDisplay.php?cinplexID=" + cinplexID + '&theater=' + theater + '&movieID=' + movieID +'&showtime=' + showtime, true);
			xmlhttp.send();
			
		}
	}
	</script>
	

	
</head>

<body style="background-color:darkgrey">
<h1 align = "center">Add to Reservation</h1>

<div align='center'> 
<form action = "AdminReserveSeat.php" method = "POST">


	<br><br>
	Select a Member:
	<select name="memberId" id = "memberSelect" required>
	<option value = ''></option>
	<?php
	
		$memberResult = mysql_query("SELECT * FROM member");
		
		while($row = mysql_fetch_array($memberResult)){
			echo "<option value='{$row['id']}'>{$row['f_name']} {$row['l_name']}</option>" ;
	}
	?>
	</select>
	<br><br>
	
	Cinema Complex: 
	
	<select name = "cinplexId" id = "cinplex" onchange = "populateTheater(this.value)" required>

			<option value ="">Select a Cineplex </option>
			<?php
				$result = mysql_query("SELECT c.name, c.id FROM cinplex c");
				
				while($row = mysql_fetch_array($result)){
					echo "<option value = '{$row['id']}' name = 'cinplex' > {$row['name']}</option>";
					exec("sdfdf");
				}
						
			?>
	</select>

	
	<br><br>
	Theater:
	<select name = "theater" id = "theaterSelect" onchange = "populateMovie()" required>
		<option value = ''>Select a Theater</option>
		
	
	</select>
	<br><br>
	
	Movie:
	
	<select name = 'movieId' id = "movieSelect" onchange = "populateShowtime()" required>
		<option value = ''>Select a Movie</option>
	</select>
	
	
	<br><br>
	
	Showtime: 
	<!--<p id = 'showtimeSelect'> text to be changed</p>-->
	<select name = 'showtime' id = "showtimeSelect"  onchange = "populateSeatTable()" required >
		<option value = ''>Select a Showtime</option>
	</select>
	

	<br><br>


	
	<div id = "seatTable" ></div>
	
		<br><br>
	
	<button>Add Reservation</button>
</form>



<form action="AdminPanelForm.php" method="POST">
<h3>Go Back</h3>
<button>BACK</button>
</form>

</body>
</html>