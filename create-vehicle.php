<?php
/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/

 session_start();
if(!isset($_SESSION['user'])){
header('Location:index.php');
}
include 'includes/dashboard_header.php' 
?>
  </head>
  <body>
 
<div id="header">
  <div class="inHeader">
    <div class="mosAdmin">
    Hello, <?php echo ucfirst($_SESSION['user']);

    ?><br>
   | <a href="includes/logout.php">Logout</a>
    </div>
  <div class="clear"></div>
  </div>
</div>

<div id="wrapper">
  <div id="leftBar">
  <ul>
 <?php
include'includes/dashboard_menu.php'
 ?>
  </ul>
  </div>
  <div id="rightContent">
  <h3>Add a New Vehicle</h3>

  <hr />
    
    <div class="shortcutHome">
    <?php 

if(isset($_POST['submit'])){

	$id_veichle=$_POST['id_veichle'];
    $model=$_POST['model'];
    $make=$_POST['make'];
    $year=$_POST['year'];
	$maintaince_date=$_POST['maintaince_date'];
		$maintaince_descripition=$_POST['maintaince_descripition'];

	$license_plate=$_POST['license_plate'];
	$km_count=$_POST['km_count'];
	$history=$_POST['history'];



      include 'includes/functions.php';
	  save_vehicle($id_veichle,$model,$make,$year,$maintaince_date,$maintaince_descripition,$license_plate,$km_count,$history);

}
     ?>
  </div>

    <table width="95%">
   <form name="newvehicle" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <tr><td width="125px"><b>Vehicle ID</b></td><td><input type="text" autocomplete="off" name="id_veichle" class="pendek" required></td></tr>
      <tr><td width="125px"><b>Model</b></td><td><input type="text" autocomplete="off" name="model" class="pendek" required></td></tr>
      <tr><td width="125px"><b>Make</b></td><td><input type="text" autocomplete="off" name="make" class="pendek" required></td></tr>
	  <tr><td width="125px"><b>Vehicle Year</b></td><td><input type="text" autocomplete="off" name="year" class="pendek" required></td></tr>
	  <tr><td width="125px"><b>Maintenance Date</b></td><td><input type="date" autocomplete="off" name="maintaince_date" class="pendek" required></td></tr>
	  <tr><td width="125px"><b>Maintenance Description</b></td><td><input type="text" autocomplete="off" name="maintaince_descripition" class="pendek" required></td></tr>
      <tr><td width="125px"><b>License Plate</b></td><td><input type="text" autocomplete="off" name="license_plate" class="pendek" required></td></tr>
      <tr><td width="125px"><b>Km Count</b></td><td><input type="text" autocomplete="off" name="km_count" class="pendek" required></td></tr>
      <tr><td width="125px"><b>History</b></td><td><input type="text" autocomplete="off" name="history" class="pendek" required></td></tr>


    </table>
 <hr />                         
  <div align="left"><input class="btn" type="submit" name="submit" value="Save Vehicle" /></div>
</form>
</div>
<?php 

include 'includes/dashboard_footer.php'

?>


   

