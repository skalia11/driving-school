<?php/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/?>
 
 <!DOCTYPE html>
<html>

<head>
  <title> Registration Page </title>
</head>

<body>
  <form name="Registration" action="register.php" method="POST" role="form" >
    <fieldset align="left">
      <h1>Select Registeration</h1>
      <hr>  
	<fieldset>
		<input type="radio" name="reg" value="ins">Instructor<br>
		<input type="radio" name="reg" value="rec">Receptionists<br>
		<input type="radio" name="reg" value="stu">Student<br>
	</fieldset>
	<hr>
	<input type="submit" name="Submit" value="Register">

    </fieldset>

</body>
</html>