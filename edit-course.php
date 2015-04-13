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
  <h3>Edit Course Information</h3>

  <hr />
    
    <div class="shortcutHome">
      <?php
if(isset($_POST['submit'])){

  $cid=$_POST['cid'];
  $cname=$_POST['coursename'];
  $cd=$_POST['description'];
  $ch=$_POST['duration'];
  $ct=$_POST['type'];
  $cp=$_POST['cost'];
 


      include 'includes/functions.php';
      update_course($cid,$cname,$cd,$ch,$ct,$cp);

}

?>
    <?php
    $cid = (isset($_GET['cid']) ? $_GET['cid'] : null);
  
  if($cid){
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT * from courses where id_course='$cid'");
$sqlr= mysqli_num_rows($sqls);
$sqlf=mysqli_fetch_assoc($sqls);
   ?>


  </div>

    <table width="95%">
     <form name="newstudent" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <tr><td width="125px"><b>Course Name</b></td><td><input type="text" maxlength="15" autocomplete="off" name="coursename" value="<?php echo $sqlf['course_name']; ?>" class="pendek" required></td></tr>
            <tr><td width="125px"><b>Course Description</b></td><td><input type="text" maxlength="25" autocomplete="off" name="description"  value="<?php echo $sqlf['description']; ?>" class="pendek" required></td></tr>
      <tr><td><b>Hours</b></td><td><input type="number" name="duration"  value="<?php echo $sqlf['duration']; ?>" maxlength="15" autocomplete="off" class="pendek" required></td></tr>
            <tr><td><b>Vehicle Type</b></td><td>
                <select name="type">
				<?php 
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT * from courses where id_course='$cid'");
$sqlr= mysqli_num_rows($sqls);
$sqlf=mysqli_fetch_assoc($sqls);

				?>
          <option value="CAR" <?php  if ($sqlf['type']=='CAR'){echo "selected";}  ?>>Car</option>
          <option value="TRUCK" <?php  if ($sqlf['type']=='TRUCK'){echo "selected";}  ?>>Truck</option>
          <option value="MOTORCYCLE" <?php  if ($sqlf['type']=='MOTORCYCLE'){echo "selected";}  ?> >Motorcycle</option>
        </select>
            </td></tr>

            <tr><td><b>Price</b></td><td><input type="text" autocomplete="off"  value="<?php echo $sqlf['cost']; ?>" name="cost" class="pendek" required></td></tr>
<input type="text" autocomplete="off"  value="<?php echo $sqlf['id_course']; ?>" name="cid" class="pendek" hidden></td></tr>


                        <tr><td><b></b></td><td>

</td>
</tr>

    </table>
 <hr />                         
  <div align="left"><input class="btn" type="submit" name="submit" value="Save Course" /></div>
</form>
<?php
}

?>
</div>
<?php 

include 'includes/dashboard_footer.php'

?>


   

