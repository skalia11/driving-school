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
  <h3>Students</h3>

  <hr />
     <div id="smallCenter"><a href="create-student.php"><br><h3><div align="center" class="btn">Create a New Student</div></h3></a></div>
  
  
    
    <div class="shortcutHome">
    
  </div>

  <table class="data">
      <tr class="data">
         <th class="data">Driving License</th>
        <th class="data">First Name</th>
        <th class="data">Last name</th>
        <th class="data">Phone</th>
        <th class="data">D.O.B</th>
        <th class="data">Gender</th>


        <th class="data" width="75px"></th>
      </tr>
      <tr class="data">
          <?php
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT * FROM PEOPLE inner join student on student.sincard=people.sincard");
$sqlr= mysqli_num_rows($sqls);
$sqlf=mysqli_fetch_assoc($sqls);

for($x=0; $x<$sqlr; $x++){
   ?>

        <td class="data" width="30px"><center><?php echo $sqlf['dl_number']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['first_name']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['last_name']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['phone_num']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['date_birth']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['gender']; ?></center></td>

        <td class="data" width="75px">
        <center>
        <a href="#"><img src="css/img/detail.png"></a>&nbsp;&nbsp;&nbsp;
        <a href="#"><img src="css/img/edit.png"></a>
                <a href="#"><img src="css/img/delete.png"></a>

        </center>
        </td>
      </tr>
    </table>
    <?php }

    ?>
</div>
<?php 

include '/includes/dashboard_footer.php'

?>


   

