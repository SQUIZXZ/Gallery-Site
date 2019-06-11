<?php 
/*PHP function used to repeat the same code. It calls the code in header.php (which is the signup/login button*/
include_once 'header.php';
?>  
<?php
// If the user is not logged in, the page will display "error" on-screen
if (!isset($_SESSION['u_id'])){ 
	header("Location: index.php?login=error");
	exit();
}

$message = ""; 
//Only allows upload attempt once the upload button has been pressed 
if (isset($_POST['upload'])) {
// The path used to store the uploaded image
	$target = "images/".basename($_FILES['image']['name']);

	// Check if file already exists
if (file_exists($target)) {
    echo "Sorry, image already exists.";
    die('Error:');
} 

	// Connecting to the database 
	$db = mysqli_connect("localhost", "root", "", "loginsystem"); 

	//defines image/text location 
    $image = $_FILES['image']['name']; 
	$text = $_POST['text'];  

    // Chooses where the image data is stored in the database 
	$sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')"; 
	mysqli_query($db, $sql); 

	// Directs the uploaded image to a folder 
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$message = "Image was uploaded successfully";
	} else  {
		$message = "There was a problem uploading your image";
	}
}

?> 
<!DOCTYPE html> 
<html> 
<head></head> 
<style> 
/* Styling the upload form*/
 #content1{
   	width: 50%;
   	margin: 150px auto; 
   	}
   	/* Styling the upload form*/
   #form1{
  position: fixed;
  top: 100px;
  left: 0;
  z-index: 999;
  background-color: #EF3028; 
  padding: 12px; 
  box-shadow: 8px 8px #F0B72C;
   
  }
  /* Styling the upload form*/
   form div{
   	margin-top: 5px; 
   }
   /* Styling the div that displays the image on screen in gallery*/
   #img_div{
   	width: 80%;
   	margin: 15px auto;
    background-color: #F0B72C; 
    box-shadow: 8px 8px #C5E1F8; 
   }
   /* Styling the div that displays the image on screen in gallery*/
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both; 
   }
   /* Styling the div that displays the image on screen in gallery*/
   img{
   	float: left;
   	margin: 5px;
   	width: 320px;
   	height: 170px;
   }
</style>
<body>
	<!-- Div for content1 (fileuploader form) -->
	<div id="content1" class="fileuploadholder">
	<?php 
// Connect to database 
	$db = mysqli_connect("localhost", "root", "", "loginsystem"); 
	// Accessing stored folder
	$sql = "SELECT * FROM images";  
	// Variable for connecting and finding stored images
	$result = mysqli_query($db, $sql);  
	// Whilst images are found in the database, they will display on-screen 
	while ($row = mysqli_fetch_array($result)) {
		// Display the images and content on-screen in gallery
		echo "<div id='img_div'>"; 
        echo "<img src='images/".$row['Image']."' >";
        echo "<p>".$row['text']."</p>";
		echo "</div>"; 
	}

?> 
<!-- Form for file upload found on the gallery (logged in) page -->
     <form id="form1" action="fileupload.php" method="post" enctype="multipart/form-data">
     	<h1>Upload your image</h1><br> 
     	<input type="hidden" name="size" value="1000000">  
     	<div>
     		<input type="file" name="image">
     	</div> 
     	<div> 
     		<textarea name="text" cols="40" rows="4" placeholder="Description..."></textarea>
     	</div> 
     	<div>
     		<input type="submit" name="upload" value="Upload Image">
     	</div>
</form>
	</div>
</body></html> 