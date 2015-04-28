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
$showTime = $_POST['showtime']; 
$theater = $_POST['t_num'];
$cinema = $_POST['cinplex_id'];
$movie = $_POST['movie_id'];
 
//Deleting the play	  
if(mysql_query("DELETE 
					FROM play 
					WHERE t_num = '{$theater}' AND
					      cinplex_id = '{$cinema}' AND
                          showtime = '{$showTime}' AND
						  movie_id = '{$movie}'")){  		 
	echo "<p style='text-align:center'>Successfully deleted Play!</p>"; 
} 
else{ 
	echo "<p style='text-align:center'>An error occurred when trying to delete the play</p>"; 
}   
?>  
 
<div style="text-align:center"> 
<form action = "AdminDeleteFromPlay.php"> 
<button type = "submit" >Delete Another Play</button> 
</form> 
 
 
<form action = "AdminPanelForm.php"> 
<button type = "submit" style="text-align:center">Admin Panel</button> 
</form> 
</div>  
 
</body> 
</html> 