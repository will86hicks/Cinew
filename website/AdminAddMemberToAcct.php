<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>


<html>
<body>

<head>
<title> 
MemberAddedToAccount
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
$acct = $_POST['account'];

//add member to existing account
$sql = "INSERT INTO member".
       "(f_name,l_name,addr,age,email,phone,membership_acct) ".
       "VALUES('$fname','$lname','$addr','$age','$email','$phone','{$acct}')";
	   
$query = mysql_query($sql) or die(mysql_error());
?>

<div align="center">
<h1>MEMBER ADDED</h1>
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