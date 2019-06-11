<?php

session_start(); 
// Check to see if the submit button has been pressed before executing code
if(isset($_POST['submit'])) {
// This executes the code found in the external file: "dbh.inc.php" that connects to the database 
	include 'dbh.inc.php'; 
// These variables are used as defence against malicious inputs and characters (username and password)
	//The variables check the database for matches 
	$uid = mysqli_real_escape_string($conn, $_POST['uid']); 
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']); 

	//Error handlers 
	//Checking to see if the login inputs are empty
	if (empty($uid) || empty($pwd)) {

		header("Location: ../index.php?login=empty");
	    exit(); 


	} else {
		//Used to search the database for any matches for email and username
		$sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";  
		$result = mysqli_query($conn, $sql, $sql1); 
		$resultCheck = mysqli_num_rows($result);  
		// If there is no match, display login error
		if ($resultCheck < 1){
            header("Location: ../index.php?login=error");
	        exit(); 
		} else {
			// fetch match
			if ($row = mysqli_fetch_assoc($result)){
				//De-crypting password to check if the password matches what the user has input against the database 
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']); 
                // If the password is wrong, a login error screen will be displayed 
				if ($hashedPwdCheck == false){ 
					// If the login attempt failed, a file is written to the directory with all the details about the user that failed to login
					$handle = fopen('loginfail.txt', 'w');
					fwrite($handle, "Failed login entries ".PHP_EOL.PHP_EOL); 
					fwrite($handle, "Username: ". $uid.PHP_EOL.PHP_EOL);
					fwrite($handle, "IP address: ".$_SERVER["REMOTE_ADDR"].PHP_EOL.PHP_EOL); 
					fwrite($handle, "Date of failed attempt: ".date("Y/m/d").PHP_EOL.PHP_EOL);
					fwrite($handle, "Time of failed attempt: ".date("G:i a").PHP_EOL.PHP_EOL); 
					fwrite($handle, "User's browser: ".$_SERVER["HTTP_USER_AGENT"].PHP_EOL.PHP_EOL);
					fwrite($handle, "Link of reference: ".$_SERVER["HTTP_REFERER"].PHP_EOL.PHP_EOL);   
					fclose($handle);
					header("Location: ../index.php?login=error");
	                exit();

					
                // If the login password is correct and matches the database field, superglobals are used to initiate sessions and check other fields 
	            // If the password matches, and the row type is 0 (non-admin), the session will log the user in as a user
				} elseif ($hashedPwdCheck == true && $row['type'] == 0 ){
                    // If the loginpassword is true, a file will be written with all the details about the user
					//Used to log the user in 
					$_SESSION['u_id'] = $row['user_id']; 
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid']; 
					$_SESSION['type'] = $row['type'];

                    $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				    $handle = fopen('loginsuccess.txt', 'w');
					fwrite($handle, "Successful logins ".PHP_EOL.PHP_EOL); 
					fwrite($handle, "Username: ". $uid.PHP_EOL.PHP_EOL);
					fwrite($handle, "IP address: ".$_SERVER["REMOTE_ADDR"].PHP_EOL.PHP_EOL); 
					fwrite($handle, "Host machine: ".$hostname.PHP_EOL.PHP_EOL);
					fwrite($handle, "Date of successful attempt: ".date("Y/m/d").PHP_EOL.PHP_EOL);
					fwrite($handle, "Time of successful attempt: ".date("G:i a").PHP_EOL.PHP_EOL); 
					fwrite($handle, "User's browser: ".$_SERVER["HTTP_USER_AGENT"].PHP_EOL.PHP_EOL);
					fwrite($handle, "Link of reference: ".$_SERVER["HTTP_REFERER"].PHP_EOL.PHP_EOL);    
					fclose($handle);
                
				    header("Location: ../index.php?login=success"); 
					exit();
					}
					// Checking to see if the user login is defined as admin (according to the column 'type' = 0/1 in the database) 
					// If the password matches, and the row type is 1 (admin), the session will log the user in as an admin
					elseif ($hashedPwdCheck == true && $row['type'] == 1 ){
                    // Session variables 
				    $_SESSION['u_id'] = $row['user_id']; 
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid']; 
					$_SESSION['type'] = $row['type'];
                    // If the loginpassword is true, a .txt file will be written with all the details about the user 
                    $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
					$handle = fopen('loginsuccess.txt', 'w');
					fwrite($handle, "Successful logins ".PHP_EOL.PHP_EOL); 
					fwrite($handle, "Username: ". $uid.PHP_EOL.PHP_EOL);
					fwrite($handle, "IP address: ".$_SERVER["REMOTE_ADDR"].PHP_EOL.PHP_EOL);
					fwrite($handle, "Host machine: ".$hostname.PHP_EOL.PHP_EOL); 
					fwrite($handle, "Date of successful attempt: ".date("Y/m/d").PHP_EOL.PHP_EOL);
					fwrite($handle, "Time of successful attempt: ".date("G:i a").PHP_EOL.PHP_EOL); 
					fwrite($handle, "User's browser: ".$_SERVER["HTTP_USER_AGENT"].PHP_EOL.PHP_EOL);
					fwrite($handle, "Link of reference: ".$_SERVER["HTTP_REFERER"].PHP_EOL.PHP_EOL);    
					fclose($handle);

                    header("Location: ../index.php?login=successadmin"); 
					exit();
               }

			}

		}

    }
}




?>