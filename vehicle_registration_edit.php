<?php/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/?>
<?php


	SESSION_START();
	//$first_name  = $_SESSION['first_name'];    
	//$last_name   = $_SESSION['last_name'];    
	//$phone_num   = $_SESSION['phone_num'];  
	//$sincard     = $_SESSION['sincard'];
	$birth_date  = $_SESSION['birth_date'];
	$gender      = $_SESSION['gender_select'];
	$radio       = $_SESSION['reg'];
	$address =  $_SESSION['address']; 
	$sincard = preg_replace('/\s+/', '',  $_SESSION['sincard']); //remove all spaces
	$first_name = preg_replace('/\s+/', '',  $_SESSION['first_name']); //remove all spaces
	$last_name = preg_replace('/\s+/', '',  $_SESSION['last_name']); //remove all spaces
	$phone_num = preg_replace('/\s+/', '',  $_SESSION['phone_num']); //remove all spaces


	
	if (isset($_SESSION['PASS_ERROR']))
	{
		echo "ERROR: " . $_SESSION['PASS_ERROR'] . "<br>";
	}
	
	if ($radio == 'rec')
	{
		//$user  = $_SESSION['user']; 
		//$pass1 = $_SESSION['pass'];
		//$pass2 = $_SESSION['pass2']; 

		$user = preg_replace('/\s+/', '',  $_SESSION['user']); //remove all spaces
		$pass1 = preg_replace('/\s+/', '',  $_SESSION['pass']); //remove all spaces
		$pass2 = preg_replace('/\s+/', '',  $_SESSION['pass2']); //remove all spaces

		if (isset($_SESSION['PASS_ERROR']))
		{
		echo "ERROR: " . $_SESSION['PASS_ERROR'] . "<br>";
		}
	}
	else
	{
		$dl_number = $_SESSION['dl_number'];
	}
	

?>

<head>
	<title> Registration Page </title>
</head>

<body>
  <form name="Registration" action="register_conformation.php" method="POST" role="form" >
		<fieldset align="left">
			<h1>Sign Up</h1>
			<h1>Enter employee's information</h1>
			<hr>	

			<label for="lblPersonalInfo">Personal Information</label> <br>
			<input name="first_name" type="text" id="first_name" value="<?php echo htmlspecialchars($first_name) ?>" size="25" required> <br> 
			<input name="last_name" type="text"  id="last_name" value="<?php echo htmlspecialchars($last_name) ?>" size="25" required> <br>

			<?php 
				if ($gender == 0)
				{
					echo ' <select id="gender_select" name="gender_select" required>
							<option value="0">Male</option>
							<option value="1">Female</option>
							</select> ';
				}
				else 
				{
					echo ' <select id="gender_select" name="gender_select" required>
						<option value="1">Female</option>
						<option value="0">Male</option>
						</select> ';
				}
			?>

			<br>
			<hr>

			<label for="lblRegistrationInformation">Registration Information</label> 
			<br>
			<input name="sincard" type="text" id="sincard" value="<?php echo htmlspecialchars($sincard) ?>" size="25" required> 
			<br> 
			<?php
				if ($radio == 'ins' or $radio == 'stu')
				{
					echo '<input name="dl_number" type="text" id="dl_number" value='; echo htmlspecialchars($dl_number); echo ' size="25" required><br>';
				}
			?>
			<input name="phone_num" type="text" id="phone_num" value="<?php echo htmlspecialchars($phone_num) ?>" size="25" required> 
			<br> 
			<label for="lblBirthDay">Birth (Month/Year)</label>
			<br>
			<input type="month" name="birth_date" value="<?php echo htmlspecialchars($birth_date) ?>"  required><br>			
			<hr>
			
			<label for="lblAddress">Address</label> <br>
			<textarea name="address" "id="address" rows="4" cols="50" > <?php echo htmlspecialchars($address) ?> </textarea>
			<hr>	
		<?php
		if ($radio == 'rec')
		{
			echo '<label for="personal_info">Account Information</label> <br>
				<input name="user" type="text" id="user" value='; echo htmlspecialchars($user); echo ' size="25" required> <br>';
			echo '<input name="pass" type="text" id="pass" value='; echo htmlspecialchars($pass1); echo ' size="25" required> <br>';
			echo '<input name="pass2" type="text" id="pass2"  value='; echo htmlspecialchars($pass2); echo ' size="25" required> <br><hr>';
		}
		?>
			<input type="submit" name="Submit" value="Register">
		</fieldset>

</body>
</html>
