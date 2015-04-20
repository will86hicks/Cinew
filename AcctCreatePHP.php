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
$start_date = "2015-01-01";
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
$sql = "INSERT INTO membership".
       "(prim_member,start_date,end_date) ".
       "VALUES('$fname $lname','$start_date','$end_date')";
	   
$query = mysql_query($sql) or die(mysql_error());
$acctNumQuery = mysql_query("select acct from membership M where M.prim_member = '{$fname} {$lname}'") or die(mysql_error());
$row = mysql_fetch_array($acctNumQuery);
//create a new member
$sql = "INSERT INTO member".
       "(f_name,l_name,addr,age,email,phone,acct) ".
       "VALUES('$fname','$lname','$addr','$age','$email','$phone','{$row['acct']}')";
	   
$query = mysql_query($sql) or die(mysql_error());
?>

<div align="center">
<h1>ACCOUNT CREATED</h1>
</div>

<br><br><br><br>

<div align="center">
<h3>Go to home page</h3>
<form action="http://cmps460server.cacs.louisiana.edu/~jjl8705">
<button>HOME</button>
</form>
</div>
</body>
</html>