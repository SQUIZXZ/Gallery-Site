<?php 
// This code is for access and the display of the admin log page
/*PHP function used to repeat the same code. It calls the code in header.php (which is the signup/login button*/
include_once 'header.php';
// If the user has logged on, and their usertype is set to "0" (user), then display an error 
if ($_SESSION["type"] == 0){
header("Location: index.php?login=not_an_admin:error");
// If the user has logged on, and their usertype is set to "1" (admin), then display the admin log page
} elseif ($_SESSION["type"] == 1){
include_once 'admin.php';
}
?>

<html> 
<head><link rel="stylesheet" type="text/css" href="style.css"/></head>  
<style>
/* Styling for h1 header*/
.adminheader{
   font-size: 40px; 
   text-align: center; 
   margin-top: 40px;
   font-weight: bold;
}
/* Styling for logs*/
.log{
	background-color:#C5E1F8;
	margin-top: 40px; 
	text-align: center; 
}
</style>
<body>
	<div>
		<!-- Header -->
		<h1 class="adminheader" >Admin Panel</h1>
	</div> 
	<div class="log"><?php
// Projecting .txt content line by line (format) for admin
	$file = "includes/loginfail.txt"; 
	$faillogin = file_get_contents($file); 
	$lines = explode("\n", $faillogin); 

	foreach($lines as $newline){
		echo $newline.'<br>';
	}
	?>  
	<div class="log"><?php
// Projecting .txt content line by line (format) for admin
	$file = "includes/signupfail.txt"; 
	$faillogin = file_get_contents($file); 
	$lines = explode("\n", $faillogin); 

	foreach($lines as $newline){
		echo $newline.'<br>';
	}?>
	<div class="log"><?php
// Projecting .txt content line by line (format) for admin
	$file = "includes/loginsuccess.txt"; 
	$faillogin = file_get_contents($file); 
	$lines = explode("\n", $faillogin); 

	foreach($lines as $newline){
		echo $newline.'<br>';
	}
    ?></div>
	</body>
</html>
