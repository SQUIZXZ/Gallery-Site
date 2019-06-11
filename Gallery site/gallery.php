<?php 
/*PHP function used to repeat the same code. It calls the code in header.php (which is the signup/login button*/
include_once 'header.php';
// Shows the file upload page only if the user is logged in 
if (isset($_SESSION['u_id'])){
	// Shows username on screen
      echo "<strong>Logged in as:</strong>"; echo " "."<b>".$_SESSION['u_uid']."</b>"; 
      echo "<br>"; 
      echo"<br><br>";  
// Displays file upload page			
include_once 'fileupload.php';
} else {
// Displays gallery view page
include_once 'galleryview.php';
}
// Displays page footer
include_once 'footer.php';
?>