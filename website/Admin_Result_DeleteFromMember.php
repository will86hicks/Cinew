<?php
include 'login.php'
?>

<html>
<body>



<?php

//Accessing the form variable from AdminDeleteFromMember.php
$memberToDelete = $_POST['member_id'];

//Deleting the member

	if(mysql_query("DELETE FROM member WHERE id = {$memberToDelete}")){
		echo "<p style='text-align:center'>Successfully deleted member!</p>";
	}
//in case it fails
	else{
		echo "<p style='text-align:center'>An error occurred when trying to delete member {$memberToDelete}</p>";
	}

?>

<div style="text-align:center">
<form action = "AdminDeleteFromMember.php">
	<button type = "submit" >Delete Another Member</button>
</form>

<form action = "AdminPanelForm.php">
	<button type = "submit" style="text-align:center">Admin Panel</button>
</form>
</div>

</body>
</html>