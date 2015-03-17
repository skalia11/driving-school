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
include '/includes/dashboard_header.php' 
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
include'/includes/dashboard_menu.php'
 ?>
  </ul>
  </div>
  <div id="rightContent">
  <h3>Register a New Receptionist</h3>

  <hr />
    
    <div class="shortcutHome">
    <?php 

if(isset($_POST['submit'])){

	$sincard=$_POST['sincard'];
    $date_birth=$_POST['date_birth'];
    $address=$_POST['address'];
    $phone_num=$_POST['phone_num'];
	$last_name=$_POST['last_name'];
	$first_name=$_POST['first_name'];
	$gender=$_POST['gender'];
	$username=$_POST['username'];
		$password=$_POST['password'];




      include 'includes/functions.php';
	  save_receptionist($sincard,$date_birth,$address,$phone_num,$last_name,$first_name,$gender,$username, $password);

}
     ?>
  </div>

    <table width="95%">
   <form name="newreceptionist" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
   	<tr><td width="125px"><b>First Name</b></td><td><input type="text" autocomplete="off" name="first_name" class="pendek" required></td></tr>
	<tr><td width="125px"><b>Last Name</b></td><td><input type="text" autocomplete="off" name="last_name" class="pendek" required></td></tr>
	<tr><td width="125px"><b>Birthday</b></td><td><input type="date" autocomplete="off" name="date_birth" class="pendek" required></td></tr>
	<tr><td width="125px"><b>Gender</b></td>
	<td width="125px"><select id="gender_select" name="gender" required>
        	<option value="" disabled selected style="display: none;">gender</option>
			<option value="0">Male</option>
			<option value="1">Female</option>
    </select></td></tr>
    <tr><td width="125px"><b>Sincard</b></td><td><input type="text" autocomplete="off" name="sincard" class="pendek" required></td></tr>
	<tr><td width="125px"><b>Phone Number</b></td><td><input type="text" autocomplete="off" name="phone_num" class="pendek" required></td></tr>
	<tr><td width="125px"><b>Addresse</b></td><td><input type="text" autocomplete="off" name="address" class="pendek" required></td></tr>
	<tr><td width="125px"><b>Username</b></td><td><input type="text" autocomplete="off" name="username" class="pendek" required></td></tr>
    <tr><td width="125px"><b>Password</b></td><td><input type="text" autocomplete="off" name="password" class="pendek" required></td></tr>




    </table>
 <hr />                         
  <div align="left"><input class="btn" type="submit" name="submit" value="Save Employee" /></div>
</form>
</div>
<?php 

include '/includes/dashboard_footer.php'

?>


   

