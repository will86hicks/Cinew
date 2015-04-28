<?php
//Author: Adam R. Mitchell (arm8759)
//Date: 4-26-2015
//Certification: I certify that everything in here is my own work with the assistants of my group members.
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
$user = $_SESSION["user"];
?>

<html>
<body>

<head>
<title> 
Admin Panel
</title>
</head>

<body style="background-color:lightgrey">
<div align="left">

<h1><u>Add to Theater</u></h1>
<head>
<style>
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}

.button4{
	background: orange;
	font-size: 24px;
	width: 150px;
	height: 80px
}

.form1 {
   display:inline;
   margin:0;
   padding:0;
}
</head>
</style>

<head>
	<title>Theater</title>
	<style> table, th, td {border: 1px solid black; border-collapse: collapse;}
				th, td {padding: 5px;text-align: center;}
			
caption{
	border: 1px solid black;
	font-size: 30;
}
</style>

</head>

<?php
    $cinplexResult = mysql_query("SELECT * FROM cinplex") or die(mysql_error());
?>


<?php
	if($user == "Admin"){
		//Display the name of each field that needs to be field out
		echo"<form action='' method='post'>
		Theater Room #: <input type='number' name='number'><br><br>";
		
		echo"Target Cinplex : <select name='complexes'>";
		while($row = mysql_fetch_array($cinplexResult))
		{
			echo "<option value='{$row['id']}'>{$row['name']} -- {$row['id']}</option>";
		}
		echo"</select>";
		echo"<br><br>
		Max Capacity: <input type='number' name='cap'><br><br>
		Seating Arrangement: <input type='text' name='seat_chart' placeholder='5x20'><br>
		<input align='center' type='submit' name='theater_button' value='Add this Theater'></form>";
		
		//if the 'Add this Theater' button gets pressed, insert all this information into the database
		if(isset($_POST['theater_button']))
		{
			if(mysql_query("SELECT * FROM theater T, cinplex C WHERE T.cinplex_id = C.id AND
									NOT EXISTS (SELECT * FROM theater T2, cinplex C2 WHERE T.cinplex_id =  C2.id AND C2.id = T2.cinplex_id AND T2.number = {$_POST['number']} AND C2.id = {$_POST['complexes']})"))
			{
				if(!empty($_POST['number']) && !empty($_POST['cap']) && !empty($_POST['seat_chart']))
				{
					$sql = "INSERT INTO theater".
							"(number,cinplex_id,cap,seat_chart) ".
							"VALUES('{$_POST['number']}','{$_POST['complexes']}','{$_POST['cap']}','{$_POST['seat_chart']}')";
							
					echo"{$_POST['number']} {$_POST['complexes']}  {$_POST['cap']}  {$_POST['seat_chart']}";
					$query = mysql_query($sql) or die(mysql_error());
					$_POST['number'] = NULL;
					$_POST['cap'] = NULL;
					$_POST['seat_chart'] = NULL;
					header("Refresh:0");

				}
			}
		}
		
		
		//a back button to go to previous page
		echo 
		"<br>
		<form action='AdminPanelForm.php'>
		<button class='button2' type='submit'>Back</button>
		</form>";
	}
	else{
		//if the user trying to access this page isn't an admin, display this message and give them
		//a back button.
		echo"<h1>Invalid Access! Not an admin</h1>";
		echo 
		"<form action='StartPage.php'>
		<button class='button2' type='submit'>Back</button>
		</form>";
	}
?>
<br><br>
<h1><u>Remove Existing Theaters: </u></h1>

<table style='width:50%'>
			<tr>
				<th></th>
				<th>Theater Number</th>
				<th>Cinplex Name -- ID</th>
				<th>Max Capacity</th>
				<th>Seating Arrangement</th>
			</tr>
<?php
//filling the table up with each cinplex that's located in the database
$alltheaters = mysql_query("SELECT * FROM theater T, cinplex C WHERE T.cinplex_id = C.id");
while($row = mysql_fetch_array($alltheaters)){
	$cinplexNameFromID = mysql_query("SELECT C.name FROM cinplex C, theater T WHERE C.id = T.cinplex_id AND T.number = ");
	echo "<tr> 
				<th>
				<form action='' method= 'POST'>
						<button type = 'submit'  value = '{$row['number']}' name = 'delete_number'>Delete</button>
						<input type='hidden' value= '{$row['cinplex_id']}' name= 'delete_cinplex_id'>
					</form>";
	$cinplexNameFromID = mysql_query("SELECT C.name FROM cinplex C, theater T WHERE C.id = T.cinplex_id AND T.number = {$row['number']} AND T.cinplex_id = {$row['cinplex_id']}") or die(mysql_error());
	$x = mysql_fetch_array($cinplexNameFromID);
	$y = $x[0];
	echo"
				</th>
				<th> {$row['number']}</th>
				<th> {$y}"; echo" -- "; echo"{$row['cinplex_id']}</th>
				<th> {$row['cap']}</th>
				<th> {$row['seat_chart']}</th>
			</tr>";
}
//giving the user an option to delete the cinplex from the database entirely (careful)!
if(isset($_POST['delete_number']))
		{
			$theaterToDelete = $_POST['delete_number'];
			$theaterOfCinplex = $_POST['delete_cinplex_id'];
			$sql = "DELETE FROM theater WHERE number = {$theaterToDelete} AND cinplex_id = {$theaterOfCinplex}";
			header("Refresh:0");
			$query = mysql_query($sql) or die(mysql_error());
		}

		
?>
</table>

<?php
	//a back button to go back to AdminPanelForm
	echo 
		"<br><form action='AdminPanelForm.php'>
		<button class='button2' type='submit'>Back</button>
		</form>";
?>

<br><br>

</div>
</body>
</html>