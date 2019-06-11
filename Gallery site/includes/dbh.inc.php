<?php

/*Declaring variables that store the server credentials*/
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem"; 

/*Connecting to server using the authorised variables*/
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

?>