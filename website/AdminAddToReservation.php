



<?php
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

<body style="background-color:darkgrey">
<h1 align = "center">Add to Reservation</h1>

<div align='center'> 
<form action = "AdminResult_AddToReservation" method = "POST">
	Cinema Complex: <br>
	<select id = "cinplex" onchange = "foo(this.value)">
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
	Showtime: <br><input type = "datetime" name = "showtime" placeholder="2015-01-01 12:00:00">

<br><br><button class='button1'>SUBMIT</button> 
</form>

<form action='AdminPanelForm.php'>
<button class='button2'>BACK</button> 
</div>

</form>
</body>
</html>