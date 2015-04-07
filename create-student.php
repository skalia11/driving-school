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
  <h3>Create a New Students</h3>

  <hr />
    
    <div class="shortcutHome">
    <?php 

if(isset($_POST['submit'])){

  $sin=$_POST['sin'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $address=$_POST['street'];
  $city=$_POST['city'];
  $postal=$_POST['postal'];
  $phone=$_POST['phone'];
  $gender=$_POST['gender'];
  $dob=$_POST['dob'];
  $dl=$_POST['dl'];
$package=$_POST['package'];

      include 'includes/functions.php';
      save_student($sin,$fname,$lname,$address,$city,$postal,$phone,$gender,$dob,$dl,$package);

}
     ?>
  </div>

    <table width="95%">
   <form name="newstudent" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <tr><td width="125px"><b>First Name</b></td><td><input type="text" maxlength="15" autocomplete="off" name="fname" class="pendek" required></td></tr>
      <tr><td><b>Last Name</b></td><td><input type="text" name="lname" maxlength="15" autocomplete="off" class="pendek" required></td></tr>
            <tr><td><b>Date of Birth</b></td><td><input type="date" autocomplete="off" name="dob" class="pendek" required></td></tr>

      <tr><td><b>Street Address</b></td><td><input type="text" maxlength="25" size="25" autocomplete="off" name="street" class="panjang" required></td></tr>
       <tr><td><b>City</b></td><td>
        <select name="city">
          <option value="LB" selected>Lethbridge</option>
          <option value="OK">Okotoks</option>
          <option value="CG">Calgary</option>
          <option value="RD">Red Deer</option>
          <option value="ED">Edmonton</option>
        </select>
      </td></tr>
     <tr><td><b>Postal Code</b></td><td><input name="postal" maxlength="6" autocomplete="off" type="text" class="pendek"></td></tr>
      <tr><td><b>Phone Num</b></td><td><input name="phone" maxlength="12" autocomplete="off" type="text" class="pendek" required></td></tr>

      <tr><td><b>Gender</b></td><td>
          <input type="radio" name="gender"  value="M">Male<br />
          <input type="radio" name="gender"  value="F">Female
      </td></tr>
            <tr><td><b>SIN Card</b></td><td><input name="sin" maxlength="9" autocomplete="off" type="text" class="pendek" required></td></tr>
                        <tr><td><b>Driving License</b></td><td><input name="dl" maxlength="10" autocomplete="off" type="text" class="pendek" required></td></tr>

      <tr><td><b>Choose Package</b></td><td>
        <?php 
        include 'includes/connect.php';
        $cquery=mysqli_query($dbhandle,"select id_course,course_name from courses");
         ?>
        <select name="package">
          <?php 
          while($sqlcq=mysqli_fetch_assoc($cquery)){ ?>
 <option value="<?php echo $sqlcq['id_course']; ?>" selected><?php echo $sqlcq['course_name']; ?></option>
 <?php } ?>
        </select>
      </td></tr>
                        <tr><td><b></b></td><td>

</td>
</tr>

    </table>
 <hr />                         
  <div align="left"><input class="btn" type="submit" name="submit" value="Save Student" /></div>
</form>
</div>
<?php 

include 'includes/dashboard_footer.php'

?>


   

