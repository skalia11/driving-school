<?php

function save_student($sin,$fname,$lname,$address,$city,$postal,$phone,$gender,$dob)
{
	include 'includes/connect.php';

	$sc=mysqli_query($dbhandle,"INSERT INTO people ('sincard', 'date_birth', 'address', 'city', 'postal', 'phone_num', 'last_name', 'first_name', 'gender', 'people_type') VALUES('$sin','$dob','$address','$city','$postal','$phone','$lname','$fname','$gender','student')");
	if(!$sc){?>
			<div class="gagal">
				Error: Sorry, We cant't create a new student at this moment !
			</div>
	<?php
		echo $sin;echo $fname;echo $lname;echo $address;echo $city;echo $postal;echo $phone;echo $gender;echo $dob;
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