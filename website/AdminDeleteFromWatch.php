<?php
//Author:			Jarred Wynan
//Date:				4-26-15
//Certification: 	I, Jarred Wynan, hereby state that this document is my work and only my work.
//					The code used was adapted from Will's adminAddToReservation script

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
	width: 140px;
	height: 60px
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
<body style="background-color:darkgrey">
<head>
	
	<script>
		function populateMovie(memberID){
			var xmlhttp;

			//Reset all the drop down lists
			document.getElementById("movieSelect").innerHTML = "<option>Select a Movie</option>";
			
			
			if(memberID == ""){
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
			xmlhttp.open("GET", "getMovieWatch.php?memberID=" + memberID, true);
			xmlhttp.send();
			
		}
	}
	</script>
	
	
</head>

<body style="background-color:darkgrey">
<h1 align = "center">Delete Movie from Watched</h1>

<div align='center'> 
<form action = "AdminDeleteFromWatchSubmit" method = "POST">
	
	Member: 
	
	<select name = "memberID" id = "memberSelect" onchange = "populateMovie(this.value)" required>

			<option value ="">Select a Member </option>
			<?php 
				$memberResult = mysql_query("SELECT * FROM member");
		
				while($row = mysql_fetch_array($memberResult)){
					echo "<option value='{$row['id']}'>{$row['f_name']} {$row['l_name']}</option>" ;
				}
			?>
	</select>
	<br><br>
	
	Movie:
	
	<select name = 'movieID' id = "movieSelect" required>
		<option value = ''>Select a Movie</option>
	</select>
	<br><br>


	<button class='button1'>Delete Watched Movie</button>
</form>



<form action="AdminPanelForm.php" method="POST">
<h3>Go Back</h3>
<button class='button2'>BACK</button>
</form>

</body>
</html>