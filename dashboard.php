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
  <h3>Dashboard</h3>
  <div class="quoteOfDay">
  <b></b>
  <i style="color: #5b5b5b;"><script type="text/javascript" src="http://www.brainyquote.com/link/quotebr.js"></script>
  </div>
  <hr />
    <div class="shortcutHome">
    <a href=""><img src="css/img/posting.png"><br><b>Create Student</b></a>
    </div>
    <div class="shortcutHome">
    <a href=""><img src="css/img/photo.png"><br><b>New Employee</b></a>
    </div>
    <div class="shortcutHome">
    <a href=""><img src="css/img/halaman.png"><br><b>New Vehicle</b></a>
    </div>
  
    
    <div class="shortcutHome">
    <div id="smallRight"><h3>Summary</h3>
    <table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
      <tr><td style="border: none;padding: 4px;">Total Number of Students</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
      <tr><td style="border: none;padding: 4px;">Total Number of Users</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
      <tr><td style="border: none;padding: 4px;">Number of vehicles</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
    </table>
    </div>
  </div>
</div>
<?php 

include '/includes/dashboard_footer.php'

?>


   

