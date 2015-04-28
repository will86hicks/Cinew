<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>


<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
$user = $_SESSION["user"];
$ID = $_SESSION['ID'];
?>

<html>
<body>

<head>
<title> 
Edit Account
</title>
</head>

<body style="background-color:darkgrey">
<div align="center">


<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: center;
}
caption{
	border: 1px solid black;
	font-size: 30;
}
.button1{
	background: yellow;
	font-size: 24px;
	width: 150px;
	height: 80px
}
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}
.button3{
	background: lightblue;
	font-size: 24px;
	width: 150px;
	height: 80px
}
.button4{
	background: orange;
	font-size: 24px;
	width: 150px;
	height: 80px
}
</head>
</style>


<?php
$memberID = $_POST['memberID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

echo"<div align='center'><h1><u>{$fname} {$lname} Deleted from Account</u></h1></div>";

$sql = "Delete from member where id = {$memberID}";
$query = mysql_query($sql) or die(mysql_error());
?>

<br><br>
<p><b>You are being redirected!</b></p>
</div>
<meta http-equiv="refresh" content="2; url=PrimeMemberPage.php"/>
</body>
</html>