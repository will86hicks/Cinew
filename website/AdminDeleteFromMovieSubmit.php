<?php 
// Jarred A Wynan - jaw4848

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
