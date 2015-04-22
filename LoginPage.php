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

<body style="background-color:lightgrey">
<div align="center">
<h3>LOGIN</h3>
<br>

<form action="LoginPagePHP.php" method="POST">
<?php
    $IDQuery = mysql_query("SELECT acct,f_name,l_name FROM member") or die(mysql_error());
?>
LOGIN ID:
<select name="ID">
	<optgroup label="Users">
<?php
	while($row = mysql_fetch_array($IDQuery)){
		echo "<option value='{$row['acct']}'>ID: {$row['acct']} Name: {$row['f_name']} {$row['l_name']}</option>" ;
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
<button type="submit">LOGIN</button>
</form>

<form action="AcctCreateForm.php">
<button type="submit">CREATE ACCOUNT</button>
</form>
</div>
</body>
</html>