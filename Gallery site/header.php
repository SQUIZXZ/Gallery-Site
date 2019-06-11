<?php 
//Starting session
session_start(); 
?>

<!DOCTYPE html> 
<html> 
<head> 
	<title>Assignment</title> 
	<!-- Linking the css stylesheet to allow content formatting -->
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body> 
<header>
	<nav> 
		<!-- Css class styled in the css file  -->
		<div class="main-wrapper">
			<ul>
				<!-- List content to transfer to the page with the home page -->
				<li><a href="index.php">Home</a></li> 
				<li><a href="Gallery.php">Gallery</a></li> 
				<li><a href="contact.php">Contact</a></li> 
				<li><a href="admin.php">Admin</a></li>
			</ul> 
			<div class="nav-login">
				<!-- If the user has logged in successfully, it will echo the logout button (logout.inc.php) instead of the log in button -->
				<?php 
				if (isset($_SESSION['u_id'])){

					echo '<form action="includes/logout.inc.php" method="POST">
					<button type="submit" name="submit">Logout</button>
                    </form>';
                } else { 
               // Displays a login button instead of a logout button 
                	echo '<form action="includes/login.inc.php" method="POST">
					<input type="text" name="uid" placeholder= "User: ryan1/ admin"> 
					<input type="password" name="pwd" placeholder="passw: test234"> 
					<button type="submit" name="submit">Login</button>
				    </form>
				    <a href="signup.php">Sign up</a>';

                }


				?>
				
				</div>
		</div>

	</nav>
	</header>