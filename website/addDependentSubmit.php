<?php
include 'login.php'
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
$monthsOfMembership = $_POST['months'];

//Default start date will be 2015-01-01
$start_date = $_SESSION["today_date"];
if($monthsOfMembership == 12){
	$end_date = "2016-01-01";
}else{
	$month = 1+ $monthsOfMembership;
	if($month < 10){
		$end_date = "2015-0$month-01";
	}else{
		$end_date = "2015-$month-01";
	}
}

$ID = $_SESSION["ID"];
$sql = "INSERT INTO membership".
       "(prim_member,start_date,end_date) ".
       "VALUES('$ID','$start_date','$end_date')";
	   
$query = mysql_query($sql) or die(mysql_error());

//$IDNumQuery = mysql_query("select acct from membership M where M.prim_member = '{$ID}'") or die(mysql_error());
//$row = mysql_fetch_array($acctNumQuery);

//create a new member
$sql = "INSERT INTO member".
       "(f_name,l_name,addr,age,email,phone) ".
       "VALUES('$fname','$lname','$addr','$age','$email','$phone')";
	   
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