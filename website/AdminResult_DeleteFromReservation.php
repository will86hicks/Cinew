<?php
//Author:			Will Hicks
//Date:				4-26-15
//Certification: 	I, Will Hicks, hereby state that this document is my work and only my work.
include "login.php";

echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
?>

<html>
<body>



<?php

//Accessing the form variable from AdminDeleteFromMember.php
$memberToDelete = $_POST['member_id'];
$acct = $_POST['acct'];

//Check to see if the about to deleted member has any dependants
												
$dependents = mysql_query("SELECT *
											FROM membership mp, member m 
											WHERE m.membership_acct = mp.acct AND
												mp.prim_member = {$memberToDelete} AND
												m.id != {$memberToDelete} ") or die(mysql_error());
												
//Deleting the member	

	if(mysql_query("DELETE FROM member WHERE id = '{$memberToDelete}'")){
		
		if(mysql_query("DELETE FROM membership WHERE prim_member = {$memberToDelete}")){
			
			echo"<p> Member was a primary member of a membership.  The membership account associated with member '{$memberToDelete}' has been deleted.</p>";
			
			//If the member has any dependants, delete them too
			if(mysql_num_rows($dependents) != 0){				
				
				if(mysql_query("DELETE FROM member WHERE membership_acct = {$acct}")){
						echo "<p>Member had dependants associated with their account.  They have been deleted as well.</p>";
				}
				
			}
				
		}
		
		echo "<p style='text-align:center'>Successfully deleted member!</p>";
	}
	else{
		echo "<p style='text-align:center'>An error occurred when trying to delete member '{$memberToDelete}'</p>";
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