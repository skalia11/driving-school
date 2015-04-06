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
     <div id="smallCenter"><a href="create-student.php"><br><h3><div align="center" class="btn">Create a New Student</div></h3></a></div>
  
  
    
    <div class="shortcutHome">
    
  </div>

  <table class="data">
      <tr class="data">
         <th class="data">Course Name</th>
        <th class="data">Hours</th>
        <th class="data">Course Type</th>
        <th class="data">Phone</th>
        <th class="data">D.O.B</th>
        <th class="data">Gender</th>



        <th class="data"></th>
      </tr>
      <tr class="data">

          <?php
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT people.sincard, people.first_name,people.last_name,student.dl_number,people.phone_num,people.date_birth,people.gender FROM PEOPLE  join student on student.sincard=people.sincard");
$sqlr= mysqli_num_rows($sqls);
while($sqlf=mysqli_fetch_assoc($sqls)){
   ?>
        <td class="data" width="30px"><center><?php echo $sqlf['dl_number']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['first_name']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['last_name']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['phone_num']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['date_birth']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['gender']; ?></center></td>

        <td class="data">
        <center>
         <?php  $sqlres=$sqlf['sincard']; ?>
        <button formmethod="post" data-url="view-student.php?sincard=<?php echo $sqlres;?>" id="demo"><img src="css/img/detail.png"></button>
        <button data-url="" id="demo"><img src="css/img/edit.png"></button>
              <button data-url="" id="demo">  <img src="css/img/delete.png"></button>

        </center>
        </td>
      </tr><?php }

    ?>
    </table>

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
        // onOpenModal: function(){
        //     alert('Opened');
        // },
        // onCloseModal: function(){
        //     alert('Closed');
        // }
    });
});
</script>

<?php 

include 'includes/dashboard_footer.php'

?>


   

