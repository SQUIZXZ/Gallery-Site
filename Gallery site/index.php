<?php 
/*PHP function used to repeat the same code. It calls the code in header.php (which is the signup/login button*/
include_once 'header.php';
?>
<!-- Sectioning used to create a wrapper for css styling and page display (home)  -->
<section class="main-container">
		<div class="main-wrapper">
			<?php
			//Notifying user that they're logged in 
			//If the the login was correct, the session will display the following...
			if (isset($_SESSION['u_id'])){
      echo "<strong>Logged in as:</strong>"; echo " "."<b>".$_SESSION['u_uid']."</b>"; 
      echo "<br>"; 
			echo"<br><br>"; 
                // Declaring the applicable browsers
				$arr_browsers = ["Firefox", "Chrome", "Safari", "Opera", 
					"MSIE", "Trident", "Edge"];
                //Connecting to user agent to allow code to reach into browser type 
                $agent = $_SERVER['HTTP_USER_AGENT'];
               
                $user_browser = '';
                foreach ($arr_browsers as $browser) {
	            if (strpos($agent, $browser) !== false) {
	            $user_browser = $browser;
	            break; 


	}	
}
//Switch used to switch between cases if a certain case is met
switch ($user_browser) {
	case 'MSIE':
		$user_browser = 'Internet Explorer';
		break;

	case 'Trident':
		$user_browser = 'Internet Explorer';
		break;

	case 'Edge':
		$user_browser = 'Internet Explorer';
		break;
}
// Displaying the user's browser on screen
echo "- You are using ".$user_browser." browser";
echo"<br><br>"; 
 
//Echoing script to allow javascript to function
echo '<script>
document.cookie="height="+screen.height;
document.cookie="width="+screen.width;

</script>'; 
//Displaying the cookies on-screen that show the width and height of the screen being used
echo "<p>- Your screen resolution is".$_COOKIE['width']."x".$_COOKIE['height']."pixels </p>"; 
 

            }

			?>
		</div> 
	</section>  
<!-- Calls the code from the footer.php file for execution --> 
<!-- Declaring stylesheet links -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<!-- Formatting the carousel -->
<div class="container" style="padding-top: 65px; width: 85%";>
  <div id="myCarousel" class="carousel slide" data-ride="carousel ">
    <!-- Indicators -->
    <ol class="carousel-indicators ">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
<!-- Carousel slides -->
      <div class="item active">
        <img src="images/event.png" alt="1s" style="width:100%;">
        <div class="carousel-caption">
        </div>
        
      </div>

      <div class="item">
        <img src="images/event2.jpg" alt="2" style="width:100%;">
        <div class="carousel-caption">
        </div>
        
      </div>
    
      <div class="item">
        <img src="images/event5.jpg" alt="3" style="width:100%;">
        <div class="carousel-caption">
          </div>
        
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div> 
<h2 class="events">Events</h2>


</body>
</html>
	<?php 
	// Executes footer code from external file (footer.php)
include_once 'footer.php';
?>
