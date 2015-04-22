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
$IDQuery = mysql_query("SELECT * FROM member M where {$ID} = M.acct") or die(mysql_error());

while($row = mysql_fetch_array($IDQuery)){
	echo"<h1>Login Successful as {$row['f_name']} {$row['l_name']}</h1>";
}
?>
<br><br>
<p><b>You are being redirected!</b></p>
</div>
<meta http-equiv="refresh" content="3; url=http://cmps460server.cacs.louisiana.edu/~jjl8705/StartPage.php"/>
</form>
</body>
</html>