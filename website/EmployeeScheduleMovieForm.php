<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>

<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>

<html>
<body>

<head>
<title> 
Schedule Movie
</title>
</head>

<div align="center">

<body style="background-color:darkgrey">
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
.button3{
	background: lightblue;
	font-size: 16px;
	width: 100px;
	height: 50px
}
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
caption{
	font-size: 36px;
}
</head>
</style>

<h3><u>Add a Movie</u></h3>
<br>
<form action="EmployeeScheduleMovieADDSubmit.php" method="POST">
<b>Movie Title:</b><br><input type="text" name="title" placeholder="Rugrats"><br><br>
<b>Movie Description:<br><textarea rows="4" cols="50" name="description"></textarea><br><br>
<b>Movie Runtime:</b><input type="number" name="runtime" placeholder="85" min="30">
<b>Movie Rating:
<select name="rating">
	<option value="">G</option>
	<option value="">PG</option>
	<option value="">PG-13</option>
	<option value="">R</option>
</select><br><br>
<b>Movie Stars:<br><textarea rows="4" cols="40" placeholder="Barack Obama, Wacka Flack, and Chris Brown" name="stars"></textarea><br><br>

<button type="submit" class="button1">Add Movie</button>
</form>

<h3><u>Schedule Movie</u></h3>
<br>
<?php
//SCHEDULE TIME
	$cinemaResult = mysql_query("SELECT * FROM cinplex") or die(mysql_error());
	
	while($row = mysql_fetch_array($cinemaResult)){
		$cinema = $row['name'];
		$cinemaID = $row['id'];
		echo
		"<table style='width:50%'>
			<caption><b>{$row['name']}</b></caption>
			<tr>
				<tr>
				<th>ID</th>
				<th>Movie Title</th>
				<th>Description</th>
				<th>Runtime</th>
				<th>Rating</th>
				<th>Stars</th>
				<th>Schedule Day</th>
				<th>Schedule Theater</th>
				<th>Schedule Time</th>
				<th></th>
			</tr>
			</tr>";
		$movieResult = mysql_query("select * from movie") or die(mysql_error());
		$num_results = mysql_num_rows($movieResult);
		
		if($num_results > 0){
			while($row2 = mysql_fetch_array($movieResult)){
			$movieTitle = $row2['title'];
			$movieID = $row2['id'];
			echo
				"<form action='EmployeeScheduleMovieSubmit.php' method='POST'>
				<tr>
					<th>{$movieID}</th>
					<th>{$movieTitle}</th>
					<th>{$row2['descr']}</th>
					<th>{$row2['runtime']}</th>
					<th>{$row2['rating']}</th>
					<th>{$row2['stars']}</th>
					<th>
						<select name='showDay'>
							<option value='2015-01-01'>Today 2015-01-01</option>
							<option value='2015-01-02'>Friday 2015-01-02</option>
							<option value='2015-01-03'>Saturday 2015-01-03</option>
							<option value='2015-01-04'>Sunday 2015-01-04</option>
							<option value='2015-01-05'>Monday 2015-01-05</option>
							<option value='2015-01-06'>Tuesday 2015-01-06</option>
							<option value='2015-01-07'>Wednesday 2015-01-07</option>
						</select>
					</th>
					<th>
						<select name='theaterNum'>";
						$theaterResult = mysql_query("select number from theater where cinplex_id = {$row['id']}") or die(mysql_error());
						while($row3 = mysql_fetch_array($theaterResult)){
							echo "<option value='{$row3['number']}'>{$row3['number']}</option>";
						}
						echo "</select>
					</th>
					<th>
						<select name='showTime'>
							<option value='00:00:00'>12:00 AM</option>
							<option value='00:30:00'>12:30 AM</option>
							<option value='01:00:00'>1:00 AM</option>
							<option value='01:30:00'>1:30 AM</option>
							<option value='02:00:00'>2:00 AM</option>
							<option value='02:30:00'>2:30 AM</option>
							<option value='03:00:00'>3:00 AM</option>
							<option value='03:30:00'>3:30 AM</option>
							<option value='04:00:00'>4:00 AM</option>
							<option value='04:30:00'>4:30 AM</option>
							<option value='05:00:00'>5:00 AM</option>
							<option value='05:30:00'>5:30 AM</option>
							<option value='06:00:00'>6:00 AM</option>
							<option value='06:30:00'>6:30 AM</option>
							<option value='07:00:00'>7:00 AM</option>
							<option value='07:30:00'>7:30 AM</option>
							<option value='08:00:00'>8:00 AM</option>
							<option value='08:30:00'>8:30 AM</option>
							<option value='09:00:00'>9:00 AM</option>
							<option value='09:30:00'>9:30 AM</option>
							<option value='10:00:00'>10:00 AM</option>
							<option value='10:30:00'>10:30 AM</option>
							<option value='11:00:00'>11:00 AM</option>
							<option value='11:30:00'>11:30 AM</option>
							<option value='12:00:00'>12:00 PM</option>
							<option value='12:30:00'>12:30 PM</option>
							<option value='13:00:00'>1:00 PM</option>
							<option value='13:30:00'>1:30 PM</option>
							<option value='14:00:00'>2:00 PM</option>
							<option value='14:30:00'>2:30 PM</option>
							<option value='15:00:00'>3:00 PM</option>
							<option value='15:30:00'>3:30 PM</option>
							<option value='16:00:00'>4:00 PM</option>
							<option value='16:30:00'>4:30 PM</option>
							<option value='17:00:00'>5:00 PM</option>
							<option value='17:30:00'>5:30 PM</option>
							<option value='18:00:00'>6:00 PM</option>
							<option value='18:30:00'>6:30 PM</option>
							<option value='19:00:00'>7:00 PM</option>
							<option value='19:30:00'>7:30 PM</option>
							<option value='20:00:00'>8:00 PM</option>
							<option value='20:30:00'>8:30 PM</option>
							<option value='21:00:00'>9:00 PM</option>
							<option value='21:30:00'>9:30 PM</option>
							<option value='22:00:00'>10:00 PM</option>
							<option value='22:30:00'>10:30 PM</option>
							<option value='23:00:00'>11:00 PM</option>
							<option value='23:30:00'>11:30 PM</option>
						</select>
					</th>
					<th>
						<input type='hidden' value='{$cinema}' name='complex'/>
						<input type='hidden' value='{$cinemaID}' name='cinplexID'/>
						<input type='hidden' value='{$row2['title']}' name='movieTitle'/>
						<input type='hidden' value='{$row2['id']}' name='movieID'/>
						<input type='submit' value='Schedule\nMovie' style='height:40px; width:100px' class='button3'/>
						</form>
					</th>
				<tr>";
		}
		}else{
			echo
			"<tr>
				<th>empty</th>
				<th>empty</th>
				<th>empty</th>
			<tr>";
		}
		echo"</table>";
	}
?>



<form action="LoginPage.php">
<button type="submit" class="button2">Back</button>
</form>

</div>
</body>
</html>