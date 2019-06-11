<!DOCTYPE html> 
<html> 
<head></head> 
<style> 
/* Styling for gallery container */
 #content1{
   	width: 50%;
   	margin: 150px auto; 
   	
   } 
   /* Styling for upload form */
   #form1{
  position: fixed;
  top: 100px;
  left: 0;
  z-index: 999;
  background-color: #EF3028; 
  padding: 12px; 
  box-shadow: 8px 8px #F0B72C;
   
  }
  /* Styling for the form div content */
   form div{
   	margin-top: 5px; 
   } 
   /* Styling for the image in the div */
   #img_div{
   	width: 80%;
   	margin: 15px auto;
    background-color: #F0B72C; 
    box-shadow: 8px 8px #C5E1F8; 
   } 
   /* Styling for image after upload */
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both; 
   } 
   /* Styling for image displayed on screen after upload */
   img{
   	float: left;
   	margin: 5px;
   	width: 320px;
   	height: 170px;
   }
</style>
<body> 
  <!-- Div for displaying uploaded image on screen -->
	<div id="content1" class="fileuploadholder">
	<?php 
// Connecting to database
	$db = mysqli_connect("localhost", "root", "", "loginsystem"); 
  // Selecting pathway to store images 
	$sql = "SELECT * FROM images"; 
  // Variable for passing the two variables 
	$result = mysqli_query($db, $sql);  
  /// Searching the database for results and matches
	while ($row = mysqli_fetch_array($result)) {
    // Displays matching image on screen in gallery
		echo "<div id='img_div'>"; 
    // Finds where image is stored to display it 
        echo "<img src='images/".$row['Image']."' >"; 
    // Gets the stored text along with the image and displays it on screen 
        echo "<p>".$row['text']."</p>";
		echo "</div>"; 
	}

?> 
</body></html> 