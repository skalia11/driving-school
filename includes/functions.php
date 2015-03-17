<?php

function save_student($sin,$fname,$lname,$address,$city,$postal,$phone,$gender,$dob){

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



?>