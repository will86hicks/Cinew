<?php
include 'login.php'
?>


<html>
<body>

<head>
<title> 
Login Successful!
</title>
</head>
<body style="background-color:lightgrey">

<div align="center">
<?php
// Access form variables
$ID = $_POST['ID'];
if($ID == "Admin"){
	echo"<h1>Login Successful as Admin</h1>";
	$_SESSION["user"] = "Admin";
}
else if($ID == "Guest"){
	echo"<h1>Login Successful as Guest</h1>";
	$_SESSION["user"] = "Guest";
}
else if($ID == "Employee"){
	echo"<h1>Login Successful as Employee</h1>";
	$_SESSION["user"] = "Employee";
}
else{
	$IDQuery = mysql_query("SELECT * FROM member M where {$ID} = M.acct") or die(mysql_error());
	while($row = mysql_fetch_array($IDQuery)){
		echo"<h1>Login Successful as {$row['f_name']} {$row['l_name']}</h1>";
		$_SESSION["user"] = "{$row['f_name']} {$row['l_name']}";
	}
}

$_SESSION["today_date"] = "2015-01-01";
?>
<br><br>
<p><b>You are being redirected!</b></p>
</div>
<meta http-equiv="refresh" content="2; url=StartPage.php"/>
</form>
</body>
</html>