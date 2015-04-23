<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
$ID = $_SESSION["ID"];
?>


<html>
<body>

<head>
<title> 
Account Created
</title>
</head>
<body style="background-color:lightgrey">

<?php
// Access form variables
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['usremail'];
$addr = $_POST['address'] ." " .$_POST['city'] ."," .$_POST['state'];
$phone = $_POST['phone'];
$age = $_POST['age'];

//find the membershipAcctnum
$membershipAcctQuery = mysql_query("select acct from membership where acct = '{$ID}'") or die(mysql_error());
$row = mysql_fetch_array($membershipAcctQuery);

//create a new member
$sql = "INSERT INTO member".
       "(f_name,l_name,addr,age,email,phone,membership_acct) ".
       "VALUES('$fname','$lname','$addr','$age','$email','$phone','{$row['acct']}')";
	   
$query = mysql_query($sql) or die(mysql_error());
?>

<div align="center">
<h1>DEPENDENT CREATED</h1>
</div>

<br><br><br><br>

<div align="center">
<h3>Redirecting...</h3>
<meta http-equiv="refresh" content="2; url=addDependent.php"/>
</div>
</body>
</html>