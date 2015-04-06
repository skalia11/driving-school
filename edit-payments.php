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
    <a href="includes/logout.php">Logout</a>
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
  $balance= $_POST['balance'];
  $payment =$_POST['payment'];


      include 'includes/functions.php';
      update_payment($sin,$payment,$balance);

}

?>
    <?php
    $sin = (isset($_GET['sincard']) ? $_GET['sincard'] : null);
  
  if($sin){
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT * FROM PEOPLE join student on student.sincard=people.sincard WHERE student.sincard='$sin'");
$sqlr= mysqli_num_rows($sqls);
$sqlf=mysqli_fetch_assoc($sqls);
   ?>


  </div>

    <table width="95%">
   <form name="payment" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <tr><td width="125px"><b>Current Balance</b></td><td><input type="text" maxlength="15" autocomplete="off" value="<?php echo $sqlf['balance']; ?>" name="balance2" class="pendek" disabled></td></tr>
      <tr><td><b>Payment</b></td><td><input type="text" name="payment" maxlength="15" autocomplete="off" value= "" class="pendek" required></td></tr>
      <tr><td><b></b></td><td><input name="sin" maxlength="9" autocomplete="off" type="text" hidden value="<?php echo $sqlf['sincard']; ?>" class="pendek" required></td></tr>
      <tr><td width="125px"><b>Current balance</b></td><td><input type="text" name="balance" hidden value="<?php echo $sqlf['balance']; ?>"  class="pendek"></td></tr>



</td>
</tr>

    </table>
 <hr />                         
  <div align="left"><input class="btn" type="submit" name="submit" value="Update Student Payment" /></div>
</form>
<?php
}

?>
</div>
<?php 

include 'includes/dashboard_footer.php'

?>


   

