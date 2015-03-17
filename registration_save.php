<?php/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/?>
<?php
	SESSION_START();
	include 'includes/connect.php';

	$first_name  = $_SESSION['first_name'];    
	$last_name   = $_SESSION['last_name'];    
	$phone_num   = $_SESSION['phone_num'];  
	$sincard     = $_SESSION['sincard'];
	$address     = $_SESSION['address'];
	$birth_date  = $_SESSION['birth_date'];
	$gender      = $_SESSION['gender_select'];
	
	if ($gender == 0)
	{
		$my_gender = "male";
	}
	else
	{
		$my_gender = "female";

	}
	mysqli_query($dbhandle, "INSERT INTO people VALUES ('$sincard', '$birth_date', '$address', '$phone_num', '$last_name', '$first_name','$my_gender')");

	if ($_SESSION['reg'] == 'rec')
	{
		$user  = $_SESSION['user']; 
		$pass1 = $_SESSION['pass'];
		$pass2 = $_SESSION['pass2']; 
		mysqli_query($dbhandle, "INSERT INTO receptionist VALUES ('$sincard', '$user', '$pass1')");
	}
	else
	{
		$dl_number = $_SESSION['dl_number'];
		if ($_SESSION['reg'] == 'ins')
		{
			mysqli_query($dbhandle, "INSERT INTO instructor VALUES ('$sincard', '$dl_number')");
		}
		else
		{
			mysqli_query($dbhandle, "INSERT INTO student VALUES ('$sincard', '$dl_number', '')");
		}

	}

	
	

?>

<head>
	<title> Registration Saved </title>
</head>

<body>
  <form name="Registration" action="dashboard.php"  role="form" >
		<fieldset align="left">
			<font color="green"><h1>Registration Saved!</h1></font>
			<hr>	

			<label for="lblPersonalInfo">Personal Information</label> <br>
			<input name="first_name" type="text" id="first_name" value="<?php echo htmlspecialchars($first_name) ?>" size="25" disabled> <br> 
			<input name="last_name" type="text"  id="last_name" value="<?php echo htmlspecialchars($last_name) ?>" size="25" disabled> <br>

			<?php 
				if ($gender == 0)
				{
					echo ' <select id="gender_select" name="gender_select" disabled>
							<option value="0">Male</option>
							<option value="1">Female</option>
							</select> ';
				}
				else 
				{
					echo ' <select id="gender_select" name="gender_select" disabled>
						<option value="1">Female</option>
						<option value="0">Male</option>
						</select> ';
				}
			?>

			<br>
			<hr>

			<label for="lblRegistrationInformation">Registration Information</label> 
			<br>
			<input name="sincard" type="text" id="sincard" value="<?php echo htmlspecialchars($sincard) ?>" size="25" disabled> 
			<br> 
			<?php
				if ($_SESSION['reg'] == 'ins' or $_SESSION['reg'] == 'stu')
				{
					echo '<input name="dl_number" type="text" id="dl_number" value='; echo htmlspecialchars($dl_number); echo ' size="25" disabled><br>';
				}
			?>
			<input name="phone_num" type="text" id="phone_num" value="<?php echo htmlspecialchars($phone_num) ?>" size="25" disabled> 
			<br> 
			<label for="lblBirthDay">Birth (Month/Year)</label>
			<br>
			<input type="month" name="birth_date" value="<?php echo htmlspecialchars($birth_date) ?>"  disabled><br>			
			<hr>
			
			<label for="lblAddress">Address</label> <br>
			<textarea name="address" "id="address" rows="4" cols="50" > <?php echo htmlspecialchars($address) ?> </textarea>
			<hr>	
		<?php
		if ($_SESSION['reg'] == 'rec')
		{
			echo '<label for="personal_info">Account Information</label> <br>
				<input name="user" type="text" id="user" value='; echo htmlspecialchars($user); echo ' size="25" disabled> <br>';
			echo '<input name="pass" type="text" id="pass" value='; echo htmlspecialchars($pass1); echo ' size="25" disabled> <br>';
			echo '<input name="pass2" type="text" id="pass2"  value='; echo htmlspecialchars($pass2); echo ' size="25" disabled> <br><hr>';
		}
		?>
			<input type="submit" name="Submit" value="Dashboard">
		</fieldset>