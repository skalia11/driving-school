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
  <h3>Student Payments</h3>

  <hr />
    
    <div class="shortcutHome"> </div>

  <table class="data">
      <tr class="data">
         <th class="data">Driving License</th>
        <th class="data">First Name</th>
        <th class="data">Last name</th>
        <th class="data">Balance</th>


        <th class="data"></th>
      </tr>
      <tr class="data">

          <?php
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT * FROM PEOPLE  join student on student.sincard=people.sincard");

$sqlr= mysqli_num_rows($sqls);
while($sqlf=mysqli_fetch_assoc($sqls)){
   ?>
        <td class="data" width="30px"><center><?php echo $sqlf['dl_number']; ?></center></td>
        <td class="data"><center><?php echo ucfirst($sqlf['first_name']); ?></center></td>
        <td class="data"><center><?php echo ucfirst($sqlf['last_name']); ?></center></td>
		        <td class="data"><center><?php echo "$". number_format($sqlf['balance'], 2); ?></center></td>


        <td class="data">
        <center>
         <?php  $sqlres=$sqlf['sincard']; ?>
        <button> <a href="edit-payments.php?sincard=<?php echo $sqlres;?>">Add Payment</a></button>

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
