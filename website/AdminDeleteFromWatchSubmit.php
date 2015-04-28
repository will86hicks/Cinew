<?php
//Author:			Jarred Wynan
//Date:				4-26-15
//Certification: 	I, Jarred Wynan, hereby state that this document is my work and only my work.

include 'login.php' 
?> 
 
<html> 
<body>  
 
<?php   
//Accessing the form variable from AdminDeleteFromWatch.php 
$memberID = $_POST['memberID']; 
$movieID = $_POST['movieID']; 
 
//Deleting the member	  
if(mysql_query("DELETE 
					FROM watch
					WHERE member_id = {$memberID} AND
					      movie_id = {$movieID}"))
						  {  		 
							echo "<p style='text-align:center'>Successfully deleted Movie!</p>"; 
						  } 
else{ 
	echo "<p style='text-align:center'>An error occurred when trying to delete the movie</p>"; 
}   
?>  
 
<div style="text-align:center"> 
<form action = "AdminDeleteFromWatch.php"> 
<button type = "submit" >Delete Another Movie from the List of Watched Movies</button> 
</form> 
 
 
<form action = "AdminPanelForm.php"> 
<button type = "submit" style="text-align:center">Admin Panel</button> 
</form> 
</div>  
 
</body> 
</html> 
