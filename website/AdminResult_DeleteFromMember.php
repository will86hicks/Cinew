<?php
include 'login.php'
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
												mp.prim_member = {$memberToDelete}") or die(mysql_error());
												
//Deleting the member	

	if(mysql_query("DELETE FROM member WHERE id = '{$memberToDelete}'")){
		
		if(mysql_query("DELETE FROM membership WHERE prim_member = {$memberToDelete}")){
			
			echo"<p> Member was a primary member of a membership.  The membership account associated with member '{$memberToDelete}' has been deleted.</p>";
			
			//If the member has any dependants, delete them too
			if(mysql_num_rows($dependents) != 0){				
				
				if(mysql_query("DELETE FROM member WHERE id = {$acct}")){
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