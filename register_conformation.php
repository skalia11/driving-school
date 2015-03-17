<?php/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/?>
 <!DOCTYPE html>

<?php
	session_start();
	
	$_SESSION['first_name'] = stripslashes($_POST['first_name']);
	$_SESSION['last_name']  = stripslashes($_POST['last_name']);
	$_SESSION['phone_num']  = stripslashes($_POST['phone_num']);
	$_SESSION['sincard']    = stripslashes($_POST['sincard']);
	$_SESSION['address']    = stripslashes($_POST['address']);
	$_SESSION['birth_date'] = stripslashes($_POST['birth_date']);

	if ($_POST['gender_select'] == 0)
	{
		$_SESSION['gender_select'] = 0;
	}
	else
	{
		$_SESSION['gender_select'] = 1;
	}


	if ($_SESSION['reg'] == 'rec')
	{
		$_SESSION['user']       = stripslashes($_POST['user']);
		$_SESSION['pass']       = stripslashes($_POST['pass']);
		$_SESSION['pass2']      = stripslashes($_POST['pass2']);
		if ($_SESSION['pass'] != $_SESSION['pass2'])
		{
			$_SESSION['PASS_ERROR'] = "ERROR: PASSWORDS NOT MATCHING";
			header ("Location: registration_edit.php");
		}	
	}
	else
	{
		$_SESSION['dl_number'] = $_POST['dl_number'];
	}
?>
	
<html>

<head>
	<title> Registration Conformation </title>
</head>

<body>
	<form name="Registration" action="registeration_direct.php" method="POST" role="form" >
		<fieldset align="left">
			<h1>Registration Conformation</h1>
			<p>Before submitting, conform information</p>
			<hr>	
			<label for="lblPersonalInfo">Personal Information</label> <br>
			<?php
				echo "First Name: " . $_SESSION['first_name'] . "<br>";
				echo "Last Name: " . $_SESSION['last_name'] . "<br>";
				if ($_SESSION['birth_date'] == 0)
				{
					echo "Male";
				}
				else
				{
					echo "Female";
				}			
			?>
			<hr>
			<label for="lblRegistrationInformation">Registration Information</label> 
			<br>
			<?php
				echo "Sin card: " . $_SESSION['sincard'] . "<br>"; 
				if ($_SESSION['reg'] == 'ins' or $_SESSION['reg'] == 'stu')
				echo "Phone Number: " . $_SESSION['phone_num'] . "<br>"; 
				echo "Birth Date: " . $_SESSION['birth_date'] . "<br>"; 
			?>
			<hr>	
			<label for="lblAddress">Address</label> <br>
			<?php
				echo "Address: " . $_SESSION['address'] . "<br>"; 	
			?>
			<?php
				if ($_SESSION['reg'] == 'rec')
				{
					echo '<hr><label for="personal_info">Account Information</label> <br>';
					echo "Username: " . $_SESSION['user'] . "<br>";
					echo "Password: " . $_SESSION['pass'] . "<br>";						
				}
			?>
			<hr>	
			<input type="submit" name="register" value="Register">
			<input type="submit" name="edit" value="Edit">
			<input type="submit" name="delete" value="delete">

		</fieldset>

</body>
</html>