<!--*****************************************************
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 *****************************************************-->
 <head>
	<?php
		session_start();
		if(!isset($_SESSION['user']))
		{
			header('Location:index.php');
		}
		include 'includes/dashboard_header.php' 
	?>
 </head>
 
 <body>
 	<!-- Create top right logout and icon for current user -->
	<div id="header">
		<div class="inHeader">
			<div class="mosAdmin">
				Hello, <?php echo ucfirst($_SESSION['user']);?><br>
				| <a href="includes/logout.php">Logout</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<!-- wrap content under id="wrapper" for design -->
	<div id="wrapper">
		<!-- dashboard for user options traversal -->
		<div id="leftBar">
			<ul>
			<?php include'includes/dashboard_menu.php'; ?>
			</ul>
		</div>
 
 		<!-- wrap content under id="rightContent" for design -->		
		<div id="rightContent">
			<h3>Edit Vehicle</h3>
			<hr />
 
				<!-- when form action is submitted, redirect to same page here
				and send the values taken from the input fields to save_receptionist
				function where the given information is validated and submitted
				to insert the data in the database if its valid --> 
				<div class="shortcutHome">
					<?php 
						if(isset($_POST['submit']))
						{
							$id_veichle=$_POST['id_veichle'];
							$model=$_POST['model'];
							$make=$_POST['make'];
							$year=$_POST['year'];
							$maintaince_date=$_POST['maintaince_date'];
							$maintaince_descripition=$_POST['maintaince_descripition'];
							$license_plate=$_POST['license_plate'];
							$km_count=$_POST['km_count'];
							$history=$_POST['history'];

							include 'includes/functions.php';
							edit_vehicle($id_veichle,$model,$make,$year,$maintaince_date,$maintaince_descripition,$license_plate,$km_count,$history);
					}
					?>
				<?php
    $vid = (isset($_GET['vid']) ? $_GET['vid'] : null);
  
  if($vid){
include 'includes/connect.php';
$sqls= mysqli_query($dbhandle,"SELECT * from vehicle where id_vehicle='$vid'");
$sqlr= mysqli_num_rows($sqls);
$sqlf=mysqli_fetch_assoc($sqls);
   ?>			
					
			
				</div>
					
				<!-- in a table, we out all the input data feilds for the 
				user to enter information in order to register veichle -->
				<table width="95%">
					<form name="newvehicle" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
							<td width="125px">
								<b>Model</b>
							</td>
							<td>
								<input type="text" autocomplete="off" name="model" value="<?php echo $sqlf['model']; ?>" class="pendek" required>
							</td>
						</tr>
						<tr>
							<td width="125px">
								<b>Make</b>
							</td>
							<td>
								<input type="text" autocomplete="off" name="make" value="<?php echo $sqlf['make']; ?>" class="pendek" required>
							</td>
						</tr>
						<tr>
							<td width="125px">
								<b>Vehicle Year</b>
							</td>
							<td>
								<input type="text" autocomplete="off" name="year" value="<?php echo $sqlf['vehicle_year']; ?>" class="pendek" required>
							</td>
						</tr>
						<tr>
							<td width="125px">
								<b>Maintenance Date</b>
							</td>
							<td>
								<input type="date" autocomplete="off" name="maintaince_date" value="<?php echo $sqlf['maintaince_date']; ?>" class="pendek" required>
							</td>
						</tr>
						<tr>
							<td width="125px">
								<b>Maintenance Description</b>
							</td>
							<td>
								<input type="text" autocomplete="off" name="maintaince_descripition" value="<?php echo $sqlf['maintaince_description']; ?>" class="pendek" required>
							</td>
						</tr>
						<tr>
							<td width="125px">
								<b>License Plate</b>
							</td>
							<td>
								<input type="text" autocomplete="off" name="license_plate" value="<?php echo $sqlf['license_plate']; ?>" class="pendek" required>
							</td>
						</tr>
						<tr>
							<td width="125px">
								<b>Km Count</b>
							</td>
							<td>
								<input type="text" autocomplete="off" name="km_count" value="<?php echo $sqlf['km_count']; ?>" class="pendek" required>
							</td>
						</tr>
						<tr>
							<td width="125px">
								<b>History</b>
							</td>
							<td>
								<input type="text" autocomplete="off" name="history" value="<?php echo $sqlf['history']; ?>" class="pendek" required>
							</td>
						</tr>
				</table>
						<hr />                         
			<input type="text" autocomplete="off" value="<?php echo $sqlf['id_vehicle']; ?>" name="id_veichle" hidden>
													
						<div align="left"><input class="btn" type="submit" name="submit" value="Save Vehicle" /></div>
					</form>
  <?php } ?>
		</div>
		
	<!-- this include allows the dashboard footer to be displayed -->
	<?php 
		include 'includes/dashboard_footer.php'
	?>
</body>

   

