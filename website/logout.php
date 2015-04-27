<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>
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
<body style="background-color:darkgrey">

<div align="center">
<h1>Logout Successful</h1>
<br><br>
<p><b>You are being redirected!</b></p>
</div>
<meta http-equiv="refresh" content="2; url=LoginPage.php"/>
</form>
</body>
</html>