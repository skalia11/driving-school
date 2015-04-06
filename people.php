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
include 'includes/dashboard_header.php' ;
include 'includes/functions.php';
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
  <h3>List of all the People</h3>

  <hr />
  
  
    
    <div class="shortcutHome">
    
  </div>

  <table class="data">
      <tr class="data">
        <th class="data">First Name</th>
        <th class="data">Last name</th>
        <th class="data">Phone</th>
        <th class="data">D.O.B</th>
        <th class="data">Gender</th>
        <th class="data">Address</th>
        <th class="data">City</th>
        <th class="data">User Roles</th>



      </tr>
      <tr class="data">

          <?php
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT people.sincard, people.address,people.city,people.postal, people.first_name,people.last_name,people.phone_num,people.date_birth,people.gender FROM PEOPLE");
$sqlr= mysqli_num_rows($sqls);

while($sqlf=mysqli_fetch_assoc($sqls)){
   ?>
   <?php
 
?>
        <td class="data"><center><?php echo ucfirst($sqlf['first_name']); ?></center></td>
        <td class="data"><center><?php echo ucfirst($sqlf['last_name']); ?></center></td>
        <td class="data"><center><?php echo $sqlf['phone_num']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['date_birth']; ?></center></td>
        <td class="data"><center><?php echo $sqlf['gender']; ?></center></td>
        <td class="data"><center><?php echo strtoupper($sqlf['address']); ?></center></td>
        <td class="data"><center><?php if($sqlf['city']=='CG'){ echo "Calgary"; }elseif($sqlf['city']=='LB'){ echo "Lethbridge";}elseif($sqlf['city']=='OK'){ echo "Okotoks";} else{
          echo "Red Deer";}?></center><center>
                  <td class="data"><center><?php who_is($sqlf['sincard']); ?></center></td>



         


        
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


   

