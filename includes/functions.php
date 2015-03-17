<?php

function save_people($sincard,$date_birth,$address,$phone_num,$last_name,$first_name,$gender)
{
			include 'includes/connect.php';

	if ($gender == 0)
	{
		$gender_select = "male";
	}
	else
	{
		$gender_select = "female";
	}
	$sc=mysqli_query($dbhandle,"INSERT INTO people (`sincard`, `date_birth`, `address`, `phone_num`, `last_name`, `first_name`, `gender`) VALUES('$sincard','$date_birth','$address','$phone_num','$last_name','$first_name','$gender_select')");

	if(!$sc){?>
			<div class="gagal">
				Error: Sorry, We cant't create a new Person at this moment !
			</div>
	<?php
	}
 }
 
function save_instructor($sincard,$date_birth,$address,$phone_num,$last_name,$first_name,$gender,$dl_number)
{
	save_people($sincard,$date_birth,$address,$phone_num,$last_name,$first_name,$gender);
		include 'includes/connect.php';

	$sc=mysqli_query($dbhandle,"INSERT INTO instructor (`sincard`, `dl_number`) VALUES('$sincard','$dl_number')");

	if(!$sc){?>
			<div class="gagal">
				Error: Sorry, We cant't create a new Instructor at this moment !
			</div>
	<?php
	}else{ ?>
	<div class="informasi">
		Success: New Instructor information has been created
	</div>
		<?php 
			header("Refresh: 3; url=instructor.php");
		}
 }
 
 function save_receptionist($sincard,$date_birth,$address,$phone_num,$last_name,$first_name,$gender,$username, $password)
{

	save_people($sincard,$date_birth,$address,$phone_num,$last_name,$first_name,$gender);
		include 'includes/connect.php';

	$sc=mysqli_query($dbhandle,"INSERT INTO receptionist (`username`, `password`) VALUES('$username', '$password')");

	if(!$sc){?>
			<div class="gagal">
				Error: Sorry, We cant't create a new Receptionist at this moment !
			</div>
	<?php
	}else{ ?>
	<div class="informasi">
		Success: New Receptionist information has been created
	</div>
		<?php 
			header("Refresh: 3; url=receptionist.php");
		}
 }
 
function save_student($sin,$fname,$lname,$address,$city,$postal,$phone,$gender,$dob)
{
	include 'includes/connect.php';

	$sc=mysqli_query($dbhandle,"INSERT INTO people ('sincard', 'date_birth', 'address', 'phone_num', 'last_name', 'first_name', 'gender', 'people_type') VALUES('$sin','$dob','$address','$city','$postal','$phone','$lname','$fname','$gender','student')");
	if(!$sc){?>
			<div class="gagal">
				Error: Sorry, We cant't create a new student at this moment !
			</div>
	<?php
	}else{ ?>
	<div class="informasi">
		Success: New student information has been created
	</div>
		<?php 
			header("Refresh: 3; url=students.php");
		}
 }


function save_vehicle($id_veichle,$model,$make,$year,$maintaince_date,$maintaince_descripition,$license_plate,$km_count,$history)
{
		include 'includes/connect.php';

	$sc=mysqli_query($dbhandle, "INSERT INTO vehicle(`id_vehicle`, `model`, `make`, `vehicle_year`, `maintaince_date`, `maintaince_description`, `license_plate`, `km_count`, `history`)  VALUES('$id_veichle' ,'$model','$make','$year','$maintaince_date','$maintaince_descripition','$license_plate','$km_count','$history')");
	if(!$sc){?>
			<div class="gagal">
				Error: Sorry, We cant't add a new veichle at this moment !
			</div>
	<?php
		echo $id_veichle;echo $model;echo $make;echo $year;echo $maintaince_date;echo $maintaince_descripition;echo $license_plate;echo $km_count;echo $history;
	}else{ ?>
	<div class="informasi">
		Success: New Veichle information has been Added !
	</div>
		<?php 
			header("Refresh: 3; url=vehicle.php");
		}
 }
?>