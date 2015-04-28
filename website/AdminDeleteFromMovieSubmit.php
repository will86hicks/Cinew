<?php 
// Jarred A Wynan - jaw4848
//Date:				4-25-15
//Certification: 	I, Jarred Wynan, hereby state that this document is my work and only my work.

include 'login.php' 
?> 
 
<html> 
<body>  
 
<?php   
//Accessing the form variable from AdminDeleteFromMovie.php 
$movieID = $_POST['movieID']; 
//$description = $_POST['description']; 
 
//Deleting the member	  
if(mysql_query("DELETE 
					FROM movie 
					WHERE id = '{$movieID}'")){  		 
	echo "<p style='text-align:center'>Successfully deleted Movie!</p>"; 
} 
else{ 
	echo "<p style='text-align:center'>An error occurred when trying to delete the movie '{$moveTitle}'</p>"; 
}   
?>  
 
<div style="text-align:center"> 
<form action = "AdminDeleteFromMovie.php"> 
<button type = "submit" >Delete Another Movie</button> 
</form> 
 
 
<form action = "AdminPanelForm.php"> 
<button type = "submit" style="text-align:center">Admin Panel</button> 
</form> 
</div>  
 
</body> 
</html> 
