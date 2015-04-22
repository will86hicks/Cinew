<?php
include 'login.php';
$_SESSION["user"] = null;
$_SESSION["today_date"] = null;
?>


<html>
<body>

<head>
<title> 
Logout Successful!
</title>
</head>
<body style="background-color:lightgrey">

<div align="center">
<h1>Logout Successful</h1>
<br><br>
<p><b>You are being redirected!</b></p>
</div>
<meta http-equiv="refresh" content="2; url=LoginPage.php"/>
</form>
</body>
</html>