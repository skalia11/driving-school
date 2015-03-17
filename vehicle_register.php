<?php/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/?>
 <!DOCTYPE html>
<html>
	
<?php
	session_start();
	$_SESSION['reg'] = $_POST['reg'];
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
      <input name="first_name" type="text" id="first_name" placeholder="First Name" size="25" required> <br> 
      <input name="last_name" type="text"  id="last_name" placeholder="Last Name" size="25" required> <br>

      <select id="gender_select" name="gender_select" required>
         <option value="" disabled selected style="display: none;">gender</option>
        <option value="0">Male</option>
        <option value="1">Female</option>
      </select> 
      <br>
      <hr>

      <label for="lblRegistrationInformation">Registration Information</label> 
      <br>
      <input name="sincard" type="text" id="sincard" placeholder="Sincard Number" size="25" required> 
      <br> 

	<?php
		if ($_SESSION['reg'] == 'ins' or $_SESSION['reg'] == 'stu')
		{
			echo '	<input name="dl_number" type="text" id="dl_number" placeholder="driving license number" size="25" required><br>';
		}
	?>
	 
	<input name="phone_num" type="text" id="phone_num" placeholder="Phone Number" size="25" required> 
      <br> 
      <label for="lblBirthDay">Birth (Month/Year)</label>
      <br>
      <input type="month" name="birth_date" required><br>     
      <hr>
      
      <label for="lblAddress">Address</label> <br>
      <textarea name="address" "id="address" rows="4" cols="50"></textarea> 
   
	<?php
		if ($_SESSION['reg'] == 'rec')
		{
			echo ' <hr> <label for="personal_info">Account Information</label> <br>
					<input name="user" type="text" id="user" placeholder="Username" size="25" required> <br> 
					<input name="pass" type="text" id="pass" placeholder="Password" size="25" required> <br>
					<input name="pass2" type="text" id="pass2" placeholder="Conform Password" size="25" required> <br> <hr> ';
		}
	?>    
      <input type="submit" name="Submit" value="Register">
    </fieldset>
	</form>
</body>
</html>