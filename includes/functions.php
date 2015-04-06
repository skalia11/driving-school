
<?php
function update_payment($sin, $payment, $balance)
{
	include 'includes/connect.php';
	$balance = $balance - $payment;
	$sc = mysqli_query($dbhandle, "UPDATE student SET balance='$balance' WHERE sincard='$sin'");
	
	if((!$sc)){?>
			<div class="gagal">
Error: Sorry, We cant't take payment at this moment !
		</div>
<?php

 }else{ ?>
<div class="informasi">
Payment accepted!
		</div>
<?php 
header("Refresh: 3; url=payments.php");

}
}

function save_student($sin,$fname,$lname,$address,$city,$postal,$phone,$gender,$dob,$dl){

include 'includes/connect.php';

$sc=mysqli_query($dbhandle,"INSERT INTO people (sincard, date_birth, address, city, postal, phone_num, last_name, first_name, gender) VALUES('$sin','$dob','$address','$city','$postal','$phone','$lname','$fname','$gender')");

$si=mysqli_query($dbhandle,"INSERT INTO student VALUES('$sin','$dl','0.00')");

if((!$sc) || (!$si)){?>
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

function update_student($sin,$fname,$lname,$address,$city,$postal,$phone,$gender,$dob,$dl){

include 'includes/connect.php';


$sc=mysqli_query($dbhandle,"UPDATE people set date_birth='$dob', address='$address', city='$city', postal='$postal', phone_num='$phone', last_name='$lname',  first_name='$fname',  gender='$gender' where sincard='$sin'");

$si=mysqli_query($dbhandle,"UPDATE student set dl_number='$dl' where sincard='$sin'");

if((!$sc) || (!$si)){?>
			<div class="gagal">

Error: Sorry, We cant't update the information !
		</div>
<?php

 }else{ ?>
<div class="informasi">
Success: Student information has been updated
		</div>
<?php 
header("Refresh: 3; url=students.php");

}
 }
function who_is($sin){

include 'includes/connect.php';
$sc=mysqli_query($dbhandle,"select * from student where sincard='$sin'");
$sc_get=mysqli_fetch_assoc($sc);
if($sc_get['sincard']==$sin){
	echo "<font color='red'>Student</font>";
}elseif($sc_get['sincard']=!$sin){
		echo "<font color='Green'>Instructor</font>";
}else{
			echo "<font color='Orange'>Admin</font>";

}
 }

function delete_student($sin){

include 'includes/connect.php';


$sdl=mysqli_query($dbhandle,"DELETE from people where sincard='$sin'");

if(!$sdl){?>
			<div class="gagal">

Error: Sorry, We can't delete the record !
		</div>
<?php

 }else{ ?>
<div class="informasi">
Student information has been deleted !
		</div>
<?php 
header("Refresh: 3; url=students.php");

}
 }
?>