<!--*****************************************************
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 *****************************************************-->
 
<head>
	<?php
	/*Begin session for the loged in user
	also check if the session isn't expired*/
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
				Hello, <?php echo ucfirst($_SESSION['user']);
				?><br>
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
			<h3>Register a New Instructor</h3>
			<hr /> <!-- line break -->
		
			<!-- when form action is submitted, redirect to same page here
			and send the values taken from the input feilds to save_instructor
			function where the given information is validated and submitted
			to insert the data in the database if its valid -->
			<div class="shortcutHome">
				<?php 
					if(isset($_POST['submit']))
					{
						$sincard=$_POST['sincard'];
						$date_birth=$_POST['date_birth'];
						$address=$_POST['street'];
						$city=$_POST['city'];
						$postal=$_POST['postal'];
						$phone_num=$_POST['phone_num'];
						$last_name=$_POST['last_name'];
							$first_name=$_POST['first_name'];
						$gender=$_POST['gender'];
						$dl_number=$_POST['dl_number'];

						include 'includes/functions.php';
						save_instructor($sincard,$date_birth,$address,$city, $postal, $phone_num,$last_name,$first_name,$gender,$dl_number);
					}
				?>
			</div>

			<!-- in a table, we out all the input data feilds for the 
			user to enter information in order to register instructor -->
			<table width="95%">
				<form name="newinstructor" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">	
					<tr>
						<td width="125px">
							<b>First Name</b>
						</td>
						<td>
							<input type="text" autocomplete="off" name="first_name" class="pendek" required>
						</td>
					</tr>
					<tr>
						<td width="125px">
							<b>Last Name</b>
						</td>
						<td>
							<input type="text" autocomplete="off" name="last_name" class="pendek" required>
						</td>
					</tr>
					<tr>
						<td width="125px">
							<b>Sincard</b>
					</td>
						<td>
							<input type="text" autocomplete="off" name="sincard" class="pendek" required>
						</td>
					</tr>
					<tr>
						<td width="125px">
							<b>Driving License Number</b>
						</td>
						<td>
							<input type="text" autocomplete="off" name="dl_number" class="pendek" required>
						</td>
					</tr>
					<tr>
						<td width="125px">
							<b>Birthday</b>
						</td>
						<td>
							<input type="date" autocomplete="off" name="date_birth" class="pendek" required>
						</td>
					</tr>
					<tr>
						<td width="125px">
							<b>Gender</b>
						</td>
						<td width="125px">
							<select id="gender_select" name="gender" required>
        						<option value="" disabled selected style="display: none;">gender</option>
								<option value="0">Male</option>
								<option value="1">Female</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="125px">
							<b>Phone Number</b>
						</td>
						<td>
							<input type="text" autocomplete="off" name="phone_num" class="pendek" required>
						</td>
					</tr>
					<tr>
						<td>
							<b>Street Address</b>
						</td>
						<td>
							<input type="text" maxlength="25" size="25" autocomplete="off" name="street" class="panjang" required>
						</td>
					</tr>
					<tr>
						<td>
							<b>City</b>
						</td>
						<td>
							<select name="city">
							<option value="LB" selected>Lethbridge</option>
							<option value="OK">Okotoks</option>
							<option value="CG">Calgary</option>
							<option value="RD">Red Deer</option>
							<option value="ED">Edmonton</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<b>Postal Code</b>
						</td>
						<td>
							<input name="postal" maxlength="6" autocomplete="off" type="text" class="pendek">
						</td>
					</tr>
			</table>
					<hr/>                         
					<div align="left"><input class="btn" type="submit" name="submit" value="Save Employee" /></div>
				</form>
		</div>

	<!-- this include allows the dashboard footer to be displayed -->
	<?php 
		include 'includes/dashboard_footer.php'
	?>
</body>

   

