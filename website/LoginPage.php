<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>
<?php
include 'login.php';
?>

<html>
<body>

<head>
<title> 
Create Account
</title>
</head>

<body style="background-color:darkgrey">
<div align="center">
<h3>LOGIN</h3>
<br>

<head>
<style>
.button2{
	background: lightblue;
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
</head>
</style>

<form action="LoginPagePHP.php" method="POST">
<?php
    $IDQuery = mysql_query("SELECT id,f_name,l_name FROM member") or die(mysql_error());
?>
LOGIN ID:
<select name="ID">
	<optgroup label="Users">
<?php
	while($row = mysql_fetch_array($IDQuery)){
		echo "<option value='{$row['id']}'>ID: {$row['id']} Name: {$row['f_name']} {$row['l_name']}</option>" ;
	}
?>
	<optgroup label="Guest">
		<option value="Guest">Guest</option>
	<optgroup label="Admin">
		<option value="Admin">Admin</option>
	<optgroup label="Employee">
		<option value="Employee">Employee</option>
</select>

<br><br>
<button type="submit" class="button1">LOGIN</button>
</form>

<form action="AcctCreateForm.php">
<button type="submit" class="button2">CREATE ACCOUNT</button>
</form>
</div>
</body>
</html>