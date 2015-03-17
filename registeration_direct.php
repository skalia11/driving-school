<?php/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/?>

<?php
session_start();
	
    if (isset($_POST['edit']))
	{
		header ("Location: registration_edit.php");
    }
    elseif (isset($_POST['register'])) 
	{
		header ("Location: registration_save.php");
    }
	elseif (isset($_POST['delete']))
	{
		header ("Location: dashboard.php");
	}

?>
