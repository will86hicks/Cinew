
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

<h1><u>Delete From Theater</u></h1>
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