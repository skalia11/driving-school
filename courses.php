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
<link rel="stylesheet" href="css/jquery-nicemodal.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery-nicemodal.js"></script>


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
  <h3>Courses Management</h3>

  <hr />  
  
    
    <div class="shortcutHome">
    
  </div>

  <table class="data">
      <tr class="data">
         <th class="data">Course Name</th>
        <th class="data">Duration</th>
        <th class="data">Vehicle Type</th>
        <th class="data">Price</th>      
<th class="data"></th> 
      </tr>
      <tr class="data">

          <?php
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT id_course,course_name,duration,cost,type from courses");
while($sqlf=mysqli_fetch_assoc($sqls)){
   ?>
        <td class="data" width="30px"><center><?php echo $sqlf['course_name']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['duration']." hours"; ?></center></td>
        <td class="data"><center><?php echo $sqlf['type']; ?></center></td>
        <td class="data"><center><?php echo "$".number_format($sqlf['cost'],2); ?></center></td>

        <td class="data">
        <center>
         <?php  $sqlres=$sqlf['id_course']; ?>
        <button> <a href="edit-course.php?cid=<?php echo $sqlres;?>">Edit Course</a></button>
              <button name="delete" id="demo" formmethod="post" data-url="delete-course.php?cid=<?php echo $sqlres;?>">Delete Course  </button>

        </center>
        </td>
      </tr><?php }

    ?>
    </table>
    <hr />
<div id="rightContent">
  <h3>Create a New Course</h3>
  <h4>Enter the course information below</h4>
</div>
<table width="95%">
           
            <?php
            if(isset($_POST['submit'])){
              $cost=$_POST['cost'];
              $duration=$_POST['duration'];
              $type=$_POST['type'];
              $description=$_POST['description'];
              $coursename=$_POST['coursename'];

            include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"INSERT into courses values('','$cost','$duration','$type','$description','$coursename')"); 
if($sqls){
?>
<div class="informasi">
New course has been added !
    </div>
<?php 
header("Refresh: 1; url=courses.php");

}
else{?>
  <div class="gagal">
Error: Sorry, We can't add a new course at this moment !
    </div>
<?php
}
}
?>
   <form name="newstudent" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <tr><td width="125px"><b>Course Name</b></td><td><input type="text" maxlength="15" autocomplete="off" name="coursename" class="pendek" required></td></tr>
            <tr><td width="125px"><b>Course Description</b></td><td><input type="text" maxlength="25" autocomplete="off" name="description" class="pendek" required></td></tr>

      <tr><td><b>Hours</b></td><td><input type="number" name="duration" maxlength="15" autocomplete="off" class="pendek" required></td></tr>
            <tr><td><b>Vehicle Type</b></td><td>
                <select name="type">
          <option value="CAR" selected>Car</option>
          <option value="TRUCK">Truck</option>
          <option value="MOTORCYCLE">Motorcycle</option>
        </select>
            </td></tr>

            <tr><td><b>Price</b></td><td><input type="text" autocomplete="off" name="cost" class="pendek" required></td></tr>
       

                        <tr><td><b></b></td><td>

</td>
</tr>

    </table>
 <hr />                         
  <div align="left"><input class="btn" type="submit" name="submit" value="Save Course" /></div>
</form>
</div>
<script>
$(function(){

    $('button#demo').nicemodal({
        width: '500px',
        keyCodeToClose: 27,
        defaultCloseButton: true,
        idToClose: '#close-nicemodal',
        closeOnClickOverlay: true,
        closeOnDblClickOverlay: false,
          //onCloseModal: function(){
       // alert('Reload Page to see the effect !');
         //   window.location.href='student.php';

         //}
        

    });
});
</script>

<?php 

include 'includes/dashboard_footer.php'

?>


   

