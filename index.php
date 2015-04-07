<!--*****************************************************
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 *****************************************************-->
 
<?php 
session_start();


if(!isset($_SESSION['log_in'])){
header('Location:login.php');

}else{
  header('Location:dashboard.php');
}

?>

