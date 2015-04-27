
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
<div align="center">

<h1><u>Delete From Cinplex</u></h1>
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
	<title>Cinplex</title>
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
				<th>Cinplex Name</th>
				<th>Address</th>
				<th>Phone Number</th>
				<th>Cinplex ID</th>
			</tr>
<?php
//filling the table up with each cinplex that's located in the database
$allcinplexes = mysql_query("SELECT * FROM cinplex");
while($row = mysql_fetch_array($allcinplexes)){
	echo "<tr> 
				<th>
				<form action='' method= 'POST'>
						<button type = 'submit'  value = '{$row['id']}' name = 'cinplex_id'>Delete</button>
					</form>
				</th>
				<th> {$row['name']}</th>
				<th> {$row['addr']}</th>
				<th> {$row['phone']}</th>
				<th> {$row['id']}</th>
			</tr>";
}
//giving the user an option to delete the cinplex from the database entirely (careful)!
if(isset($_POST['cinplex_id']))
		{
			$cinplexToDelete = $_POST['cinplex_id'];
			$sql = "DELETE FROM cinplex WHERE id = {$cinplexToDelete}";
			header("Refresh:0");
			$query = mysql_query($sql) or die(mysql_error());
		}		
?>
</table>

<?php
	echo 
		"<br><form action='AdminPanelForm.php'>
		<button class='button2' type='submit'>Back</button>
		</form>";
?>
<br><br>

</div>
</body>
</html>