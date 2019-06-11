<?php
/*This code stops users from making a malicious attempt at skipping the login process and exposing data*/
/*This checks to see whether a user has used the defined button to apply their input*/
//If the user has submitted using the sign up button, then...
if (isset($_POST['submit'])){
//Connects to database
include_once 'dbh.inc.php'; 

/*Using the "escape" method, the inputs become more immune to sql injections and malicious attack by converting inputted code into harmless text*/
// Sign up form inputs

$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']); 

// Error handlers: checking to see if the field inputs have been used 
if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
	// Error: for users that don't fill in all the fields  
	// Variable for declaring host IP
	$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
	// Opens a new .txt file to write data to
	$handle = fopen('signupfail.txt', 'w'); 
	// Each one of these lines writes a line of information to a .txt file located in the directory
	fwrite($handle, "Failed sign up entries ".PHP_EOL.PHP_EOL);
    fwrite($handle, "IP address: ".$_SERVER["REMOTE_ADDR"].PHP_EOL.PHP_EOL);
    fwrite($handle, "Host machine: ".$hostname.PHP_EOL.PHP_EOL);
    fwrite($handle, "Date of failed attempt: ".date("Y/m/d").PHP_EOL.PHP_EOL);
    fwrite($handle, "Time of failed attempt: ".date("G:i a").PHP_EOL.PHP_EOL); 
	fwrite($handle, "User's browser: ".$_SERVER["HTTP_USER_AGENT"].PHP_EOL.PHP_EOL);
	fwrite($handle, "Link of reference: ".$_SERVER["HTTP_REFERER"].PHP_EOL.PHP_EOL); 
    fclose($handle); 
	header("Location: ../signup.php?signup=empty");  
    exit(); 

}else{
	//Validating input fields
	//Checking input characters for both first and last name on the form 
	if(!preg_match("/^[a-zA-Z]*$/", $first ) || !preg_match("/^[a-zA-Z]*$/", $last)){ 

		header("Location: ../signup.php?signup=invalid");  
        exit();


	} else {
		//Email validation
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ 

			header("Location: ../signup.php?signup=email");  
            exit();


		} else {
            // Validating whether user exists
			$sql = "SELECT * FROM users WHERE user_uid='$uid'";
			$result = mysqli_query($conn, $sql);  
			$resultCheck = mysqli_num_rows($result); 
            // Check to see if a user result occurs
			if($resultCheck > 0){ 

				header("Location: ../signup.php?signup=usertaken");  
                exit();


			} else { 
				//Password hashing to counter malicious activity 
				$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 
				//Applying/ creating new user to database 
				$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";  
				mysqli_query($conn, $sql); 
				header("Location: ../signup.php?signup=success");  
                exit();


			}  


		}


	}

}

} else {
// If previous code does not run, the user will have to try again due to failed attempt
	header("Location: ../signup.php");  

	exit(); 

/*Otherwise, it falls to the else statement which will regress directories and make sure the user can only access the form*/ 
/*Users cannot mess with the url to skip the process. The sign up / login system remains sequential.*/
}


?>