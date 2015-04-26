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


$prim_memberCount = mysql_query("select count(Distinct id) as num from member;") or die(mysql_error());
$row = mysql_fetch_array($prim_memberCount);
$primID = $row['num'] + 1;

$sql = "INSERT INTO membership".
       "(prim_member,start_date,end_date) ".
       "VALUES('$primID','$start_date','$end_date')";
	   
$query = mysql_query($sql) or die(mysql_error());

$membershipNum = mysql_query("select count(*) as num from membership") or die(mysql_error());
$row = mysql_fetch_array($membershipNum);

//create a new member
$sql = "INSERT INTO member".
       "(f_name,l_name,addr,age,email,phone,membership_acct) ".
       "VALUES('$fname','$lname','$addr','$age','$email','$phone','{$row['num']}')";
	   
$query = mysql_query($sql) or die(mysql_error());
?>

<div align="center">
<h1>ACCOUNT CREATED</h1>
</div>

<br><br><br><br>

<div align="center">
<h3>Go Back to Admin Panel page</h3>
<form action="AdminPanelForm.php">
<button>Admin Panel Page</button>
</form>
<h3>Add another member</h3>
<form action="AdminAddToMember.php">
<button>Add Another Member</button>
</form>
</div>

</body>
</html>