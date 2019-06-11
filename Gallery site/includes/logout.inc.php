<?php 
// Removes the session content and replaces it with the non-logged in user content 
if (isset($_POST['submit'])){
// Logs user out
	session_start();
	session_unset();  
	session_destroy();  
	header("Location: ../index.php"); 
	exit(); 
}


?>