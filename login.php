<!--*****************************************************
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 *****************************************************-->
 
<head>
	<?php
		session_start();
		if(isset($_SESSION['user']))
		{
			header('Location:dashboard.php');
		}
		include 'includes/header.php' 
	?>
</head>

<body>
	<?php
		//$link='';
		$form='<form role="form" method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
			<div class="form-group">
				<label for="exampleInputText1">Username</label>
				<input type="text" autocomplete="off" class="form-control" name="user" placeholder="Enter Username" required autofocus>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" autocomplete="off" class="form-control" name="pass" placeholder="Enter Password" required>
			</div>
			<input class="btn btn-lg btn-block btn-danger" type="submit" name="submit" value="Submit">
		</form>';
	?>
 
	<div class="site-wrapper">
		<div class="site-wrapper-inner">
			<div class="cover-container">
				<div class="masthead clearfix">
					<div class="inner"></div>
				</div>
				<div class="inner cover">
					<div class="jumbotron">
						<div class="container">
							<div class="well well-lg">
								<div align="center">
									<h1>Driving School</h1>
									<h2>Login Panel</h2>
								</div>
								<hr />
								<?php
								if(isset($_POST['submit']))
								{
									$myusername = $_POST['user'];    //require from index username input 
									$mypassword = $_POST['pass'];    //require from index password input
									$myusername = stripslashes($myusername); //prevents SQL injection on $myusername
									$mypassword = stripslashes($mypassword); //prevents SQL injection on $password

									include('includes/connect.php'); //to connect to server
									$result = mysqli_query($dbhandle,"SELECT * FROM receptionist WHERE username='$myusername' and password='$mypassword'"); 
									$count = mysqli_num_rows($result);  

									if ($count == 1) //user sucessfully login
									{
										$_SESSION['user']=$myusername;
										
										if(isset($_SESSION['user']))
										{
											header("location:dashboard.php");
										}
										else
										{ 
								?>
											<div align="center" class="alert alert-danger" role="alert">
												<h4>Error 1042: We are not able to redirect you ! !</h4>
											</div> 
										<?php 
										}
									}
									else 
									{ 
										?>
										<div align="center" class="alert alert-danger" role="alert">
											<h4>Your username or password is incorrect !</h4>
										</div>
										
										<?php
											mysqli_close($dbhandle); //close query
											echo $form; 
									}
										?>
							</div>
						</div>
					</div>
							<?php 
								}
								else 
								{
									echo $form;
								}
							?>
				</div>
			</div>
		</div>
	</div>
<?php
	include 'includes/footer.php'
?>


   

