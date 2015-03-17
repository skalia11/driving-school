<?php
/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/

session_start();

	if(isset($_SESSION['user'])){
		session_destroy();
		session_unset();

	header("location:../index.php");
}


?>