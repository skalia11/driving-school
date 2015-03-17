<?php/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/?>
 
<?php
	require('includes/connect.php'); //to connect to server
	$myusername = $_POST['user'];    //require from index username input 
	$mypassword = $_POST['pass'];    //require from index password input
	$myusername = stripslashes($myusername); //prevents SQL injection on $myusername
	$mypassword = stripslashes($mypassword); //prevents SQL injection on $password
	

?>