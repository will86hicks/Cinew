<?php
include 'login.php'
?>


<html>
<body style="background-color:lightgrey">

<head>
<title> 
Movie Viewage History
</title>
</head>

<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
caption{
	font-size: 48px
}
</style>
</head>

<div align="center">
<?php
	$selectedThis = $_POST['chosenSelection'];
	
	if($selectedThis != "allMembers"){
		$ID = $selectedThis;
		//find the membershipAcctnum
		$membershipAcctQuery = mysql_query("select acct from membership where acct = '{$ID}'") or die(mysql_error());
		$row = mysql_fetch_array($membershipAcctQuery);
		
		
	}else{
		echo"all";
	}
?>

<form action="" method="POST">
<h3>Go Back</h3>
<button>BACK</button>
</form>

</div>
</body>
</html>