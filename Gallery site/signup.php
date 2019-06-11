<?php
// Executing the code for the nav bar header once
include_once 'header.php';
?>
<!-- Creating sign up button --> 
<!-- External styling sheets --> 
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
 

<section class="main-container">
		<div class="main-wrapper">
			<h2>Sign up</h2> 
			<!-- Form inputs for users to use upon signing up --> 
			<!-- Using "action" attribute to allow the sign up form to refer to the external file--> 
			<!-- Directing user to signup.inc.php that sign in functionality --> 
			<!-- Using POST method to ensure sign up data is not revealed-->
			<form class="signup-form" action="includes/signup.inc.php" method="POST">
				<input type="text" name="first" placeholder="Firstname">
				<input type="text" name="last" placeholder="Lastname">
				<input type="text" name="email" placeholder="Email">
				<input type="text" name="uid" placeholder="Username">
				<input type="password" name="pwd" placeholder="Password"> 
				<input style="background-color: #696969;" type="submit" name="submit" value="Sign up"></input>
			</form>
		</div>
	</section> 
	<style>
	/* Css styling for sign up page buttons (facebook, twitter and pinterest)*/
.fa {
    padding: 20px;
    font-size: 30px;
    width: 80px;
    text-align: center;
    text-decoration: none;
} 

.fa:hover {
    opacity: 0.8;
}

.fa-facebook {
    background: #3B5998;
    color: white;
    position: absolute; 
    top: 25%;
   
}

.fa-twitter {
    background: #55ACEE;
    color: white; 
    position: absolute; 
    top: 33%;
    
    
} 
.fa-pinterest {
  background: #cb2027;
  color: white;
  position: absolute; 
  top: 17%;
  
}

.fa-reddit {
  background: #ff5700;
  color: white; 
  position: absolute; 
  top: 41%;
  
}


</style> 
<div>
	<!-- Social media buttons -->
<a href="https://www.facebook.com/Art-721174541353330/" class="fa fa-facebook"></a>
<a href="https://twitter.com/artandartists_?lang=en" class="fa fa-twitter"></a> 
<a href="https://www.pinterest.co.uk/categories/art/" class="fa fa-pinterest"></a> 
<a href="https://www.reddit.com/" class="fa fa-reddit"></a> 
</div> 
<!-- Contact us glyphicon under sign up form -->
<p style="text-align: center; margin: 0 auto; padding-top: 50px;">Contact us:
        <a href="#">
          <span class="glyphicon glyphicon-envelope"></span>
        </a>
      </p>

	<?php
	// Displaying the page footer using an external file
include_once 'footer.php';
?>
