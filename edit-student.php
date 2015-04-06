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
  <h3>Edit Student Information</h3>

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


      include 'includes/functions.php';
      update_student($sin,$fname,$lname,$address,$city,$postal,$phone,$gender,$dob,$dl);

}

?>
    <?php
    $sin = (isset($_GET['sincard']) ? $_GET['sincard'] : null);
  
  if($sin){
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT people.sincard, people.address,people.city,people.postal, people.first_name,people.last_name,student.dl_number,people.phone_num,people.date_birth,people.gender FROM PEOPLE  join student on student.sincard=people.sincard WHERE student.sincard='$sin'");
$sqlr= mysqli_num_rows($sqls);
$sqlf=mysqli_fetch_assoc($sqls);
   ?>


  </div>

    <table width="95%">
   <form name="newstudent" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <tr><td width="125px"><b>First Name</b></td><td><input type="text" maxlength="15" autocomplete="off" value="<?php echo $sqlf['first_name']; ?>" name="fname" class="pendek" required></td></tr>
      <tr><td><b>Last Name</b></td><td><input type="text" name="lname"maxlength="15" autocomplete="off" value="<?php echo $sqlf['last_name']; ?>" class="pendek" required></td></tr>
            <tr><td><b>Date of Birth</b></td><td><input type="date" autocomplete="off" name="dob" value="<?php echo $sqlf['date_birth']; ?>" class="pendek" required></td></tr>

      <tr><td><b>Street Address</b></td><td><input type="text" size="25" maxlength="25" autocomplete="off" name="street" value="<?php echo $sqlf['address']; ?>" class="panjang" required></td></tr>
       <tr><td><b>City</b></td><td>
        <select name="city">
          <option <?php if($sqlf['city']=="LB"){ echo "selected";} ?> value="LB">Lethbridge</option>
          <option <?php if($sqlf['city']=="OK"){ echo "selected";} ?> value="OK">Okotoks</option>
          <option <?php if($sqlf['city']=="CG"){ echo "selected";} ?> value="CG">Calgary</option>
          <option <?php if($sqlf['city']=="RD"){ echo "selected";} ?> value="RD">Red Deer</option>
          <option <?php if($sqlf['city']=="ED"){ echo "selected";} ?> value="ED">Edmonton</option>
        </select>
      </td></tr>
     <tr><td><b>Postal Code</b></td><td><input name="postal" maxlength="6" autocomplete="off" type="text" value="<?php echo $sqlf['postal']; ?>" class="pendek"></td></tr>
      <tr><td><b>Phone Num</b></td><td><input name="phone" maxlength="12" autocomplete="off" type="text" value="<?php echo $sqlf['phone_num']; ?>" class="pendek" required></td></tr>

      <tr><td><b>Gender</b></td><td>
          <input type="radio" <?php if($sqlf['gender']=="M"){ echo "checked";} ?> name="gender"  value="M">Male<br />
          <input type="radio" <?php if($sqlf['gender']=="F"){ echo "checked";} ?> name="gender"  value="F">Female
      </td></tr>
            <tr><td><b></b></td><td><input name="sin" maxlength="9" autocomplete="off" type="text" hidden value="<?php echo $sqlf['sincard']; ?>" class="pendek" required></td></tr>
                        <tr><td><b>Driving License</b></td><td><input name="dl" maxlength="10" autocomplete="off" value="<?php echo $sqlf['dl_number']; ?>" type="text" class="pendek" required></td></tr>


                        <tr><td><b></b></td><td>

</td>
</tr>

    </table>
 <hr />                         
  <div align="left"><input class="btn" type="submit" name="submit" value="Update Student Information" /></div>
</form>
<?php
}

?>
</div>
<?php 

include 'includes/dashboard_footer.php'

?>


   

