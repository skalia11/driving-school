<!--*****************************************************
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 *****************************************************-->
 
<?php

/*this function takes in its parameters all the necessary 
variables that are needed into inserting a new attribute
in the people query*/
function save_people($sincard,$date_birth,$address,$city, $postal, $phone_num,$last_name,$first_name,$gender1)
{	
	/*include connect file that configures the 
	connection to the database */
	include 'includes/connect.php';

	/*since gender is a radio value, we 
	want to differentiate the 0 or 1
	of the radio value to identify 
	male from female and insert the 
	result into the database*/
	if ($gender1 == 0)
	{
		$gender_select = "M";
	}
	else
	{
		$gender_select = "F";
	}
	
	/*query to insert into the people table*/
	$sc=mysqli_query($dbhandle,"INSERT INTO people (sincard, date_birth, address, city, postal, phone_num, last_name, first_name, gender) VALUES('$sincard','$date_birth','$address','$city','$postal','$phone_num','$last_name','$first_name','$gender_select')");

	/*checks if query insertion is successful
	if not display error*/
	if(!$sc)
	{?>
		<div class="gagal">
			Error: Sorry, We cant't create a new Person at this moment !
		</div><?php
	}
 }
 
 /*this function takes in its parameters all the necessary 
variables that are needed update student payment*/
function update_payment($sin, $payment, $balance)
{
	$sin = stripslashes($sin);        	 
	$payment = stripslashes($payment);   
	$balance = stripslashes($balance);   

	/*balance is the student balance where 
	payment is how much he is paying.
	So to new balance is the old balance
	minus the payment made*/
	$balance = $balance - $payment;

	/*include connect file that configures the 
	connection to the database */
	include 'includes/connect.php';

	/*query to update a student balance*/
	$sc = mysqli_query($dbhandle, "UPDATE student SET balance='$balance' WHERE sincard='$sin'");

	/*checks if query insertion is successful
	if not display error*/	
	if((!$sc))
	{?>
		<div class="gagal">
			Error: Sorry, We cant't take payment at this moment !
		</div><?php
	}
	else
	{?>
		<div class="informasi">
			Payment accepted!
		</div><?php 
		header("Refresh: 3; url=payments.php");
	}
}

/*this function takes in its parameters all the necessary 
variables that are needed into inserting a new attribute 
in the student query*/
function save_student($sin,$fname,$lname,$address,$city,$postal,$phone,$gender,$dob,$dl,$package){

include 'includes/connect.php';

$fc=mysqli_query($dbhandle,"select cost from courses where id_course='$package'");
$cf=mysqli_fetch_assoc($fc);
$pc=$cf['cost'];
$sc=mysqli_query($dbhandle,"INSERT INTO people (sincard, date_birth, address, city, postal, phone_num, last_name, first_name, gender) VALUES('$sin','$dob','$address','$city','$postal','$phone','$lname','$fname','$gender')");

$si=mysqli_query($dbhandle,"INSERT INTO student VALUES('$sin','$dl','$pc')");


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

function who_is($sin)
{
	/*stripslashes is a function that remvoes any slashes
	in the given input, used to prevent SQL injection*/
	$sin = stripslashes($sin);      

	/*include connect file that configures the 
	connection to the database */
	include 'includes/connect.php';

	$sc=mysqli_query($dbhandle,"select * from student where sincard='$sin'");
	$sc_get=mysqli_fetch_assoc($sc);

	if($sc_get['sincard']==$sin)
	{
		echo "<font color='red'>Student</font>";
	}
	elseif($sc_get['sincard']=!$sin)
	{
		echo "<font color='Green'>Instructor</font>";
	}
	else
	{
		echo "<font color='Orange'>Staff</font>";
	}
}



 
/*this function takes in its parameters all the necessary 
variables that are needed into inserting a new attribute 
in the vehicle query*/
function save_vehicle($id_veichle,$model,$make,$year,$maintaince_date,$maintaince_descripition,$license_plate,$km_count,$history)
{
	/*stripslashes is a function that remvoes any slashes
	in the given input, used to prevent SQL injection*/
	$id_veichle = stripslashes($id_veichle);     						    
	$model = stripslashes($model);    			 						    
	$make = stripslashes($make);     			 						    
	$year = stripslashes($year);     			 				  		    
	$maintaince_date = stripslashes($maintaince_date);  				    
	$maintaince_descripition = stripslashes($maintaince_descripition);      
	$license_plate = stripslashes($license_plate);     					    
	$km_count = stripslashes($km_count);     							    
	$history = stripslashes($history);     								    

	/*include connect file that configures the 
	connection to the database */
	include 'includes/connect.php';

	/*a insertion query in the student table*/		
	$sc=mysqli_query($dbhandle, "INSERT INTO vehicle VALUES('$id_veichle' ,'$model','$make','$year','$maintaince_date','$maintaince_descripition','$license_plate','$km_count','$history')");

	/*checks if query insertion is successful
	if not display error*/
	if(!$sc)
	{?>
		<div class="gagal">
			Error: Sorry, We cant't add a new veichle at this moment !
		</div><?php
		echo $id_veichle;echo $model;echo $make;echo $year;echo $maintaince_date;echo $maintaince_descripition;echo $license_plate;echo $km_count;echo $history;
	}
	else
	{ ?>
		<div class="informasi">
			Success: New Veichle information has been Added !
		</div><?php 
		header("Refresh: 3; url=vehicle.php");
	}
 }

/*this function takes in its parameters all the necessary 
variables that are needed into inserting a new attribute 
in the instructor query*/
function save_instructor($sincard,$date_birth,$address,$city, $postal, $phone_num,$last_name,$first_name,$gender,$dl_number)
{
	/*stripslashes is a function that remvoes any slashes
	in the given input, used to prevent SQL injection*/
	$sincard = stripslashes($sincard);         
	$date_birth = stripslashes($date_birth);   
	$city = stripslashes($city);               
	$postal = stripslashes($postal);           
	$phone_num = stripslashes($phone_num);     
	$last_name = stripslashes($last_name);     
	$first_name = stripslashes($first_name);   
	$gender = stripslashes($gender); 		   
	$dl_number = stripslashes($dl_number); 	   

	/*call save_people function declared above that inserts
	the given data into people table*/	
	save_people($sincard,$date_birth,$address,$city, $postal, $phone_num,$last_name,$first_name,$gender);	

	/*include connect file that configures the 
	connection to the database */
	include 'includes/connect.php';

	/*a insertion query in the instructor table*/		
	$sc=mysqli_query($dbhandle,"INSERT INTO `Instructor`(`sincard`, `dl_number`) VALUES ('$sincard','$dl_number')");

	/*checks if query insertion is successful
	if not display error*/
	if(!$sc)
	{?>
		<div class="gagal">
			Error: Sorry, We cant't create a new Instructor at this moment !
		</div><?php
	}
	else
	{ ?>
		<div class="informasi">
			Success: New Instructor information has been created
		</div><?php 
		header("Refresh: 3; url=employee.php");
	}
 }
 
/*this function takes in its parameters all the necessary 
variables that are needed into inserting a new attribute 
in the receptionist query*/
function save_receptionist($sincard,$date_birth,$address,$city, $postal, $phone_num,$last_name,$first_name,$gender,$username, $password)
{
	/*stripslashes is a function that remvoes any slashes
	in the given input, used to prevent SQL injection*/
	$sincard = stripslashes($sincard);         
	$date_birth = stripslashes($date_birth);   
	$city = stripslashes($city);               
	$postal = stripslashes($postal);           
	$phone_num = stripslashes($phone_num);     
	$last_name = stripslashes($last_name);     
	$first_name = stripslashes($first_name);   
	$gender = stripslashes($gender); 		   
	$username = stripslashes($username); 	   
	$password = stripslashes($password); 	   

	/*call save_people function declared above that inserts
	the given data into people table*/	
	save_people($sincard,$date_birth,$address,$city, $postal, $phone_num,$last_name,$first_name,$gender);

	/*include connect file that configures the 
	connection to the database */
	include 'includes/connect.php';

	/*a insertion query in the receptionist table*/			
	$sc=mysqli_query($dbhandle,"INSERT INTO `receptionist`(`sincard`, `username`, `password`) VALUES ('$sincard','$username','$password')");

	/*checks if query insertion is successful
	if not display error*/
	if(!$sc)
	{?>
		<div class="gagal">
			Error: Sorry, We cant't create a new Receptionist at this moment !
		</div><?php
	}
	else
	{ ?>
		<div class="informasi">
			Success: New Receptionist information has been created
		</div><?php 
		header("Refresh: 3; url=employee.php");
	}
 }
 
 /*this function takes in its parameters all the necessary 
variables that are needed update student payment*/
function update_course($cid,$cname,$cd,$ch,$ct,$cp)
{
	$cid = stripslashes($cid);        	 
	$cname = stripslashes($cname);   
	$cd = stripslashes($cd);   
	$ch = stripslashes($ch); 
	$ct = stripslashes($ct); 
	$cp = stripslashes($cp); 
	
include 'includes/connect.php';


$sc=mysqli_query($dbhandle,"UPDATE courses set cost='$cp', duration='$ch', type='$ct', description='$cd', course_name='$cname' where id_course='$cid'");

if(!$sc){?>
			<div class="gagal">

Error: Sorry, We can't update the information !
		</div>
<?php

 }else{ ?>
<div class="informasi">
Success: Course information has been updated
		</div>
<?php 
header("Refresh: 3; url=courses.php");

}
 }
 
 function edit_vehicle($id_veichle,$model,$make,$year,$maintaince_date,$maintaince_descripition,$license_plate,$km_count,$history)
{
	/*stripslashes is a function that remvoes any slashes
	in the given input, used to prevent SQL injection*/
	$id_veichle = stripslashes($id_veichle);     						    
	$model = stripslashes($model);    			 						    
	$make = stripslashes($make);     			 						    
	$year = stripslashes($year);     			 				  		    
	$maintaince_date = stripslashes($maintaince_date);  				    
	$maintaince_descripition = stripslashes($maintaince_descripition);      
	$license_plate = stripslashes($license_plate);     					    
	$km_count = stripslashes($km_count);     							    
	$history = stripslashes($history);     								    

	/*include connect file that configures the 
	connection to the database */
	include 'includes/connect.php';

	/*a insertion query in the student table*/		
	$sc=mysqli_query($dbhandle, "UPDATE vehicle set model='$model',make='$make', vehicle_year='$year', maintaince_date='$maintaince_date', maintaince_description='$maintaince_descripition', license_plate='$license_plate', km_count='$km_count', history='$history' where id_vehicle='$id_veichle'");

	/*checks if query insertion is successful
	if not display error*/
	if(!$sc)
	{?>
		<div class="gagal">
			Error: Sorry, We cant't add a new vehicle at this moment !
		</div><?php
	}
	else
	{ ?>
		<div class="informasi">
			Success:  Vehicle information has been Updated !
		</div><?php 
		header("Refresh: 3; url=vehicle.php");
	}
 }
 

 function edit_instructor($sincard,$date_birth,$address,$city, $postal, $phone_num,$last_name,$first_name,$gender,$dl_number)
{
	/*stripslashes is a function that remvoes any slashes
	in the given input, used to prevent SQL injection*/
	include 'includes/connect.php';


$sc=mysqli_query($dbhandle,"UPDATE people set date_birth='$date_birth', address='$address', city='$city', postal='$postal', phone_num='$phone_num', last_name='$last_name',  first_name='$first_name',  gender='$gender' where sincard='$sincard'");

$si=mysqli_query($dbhandle,"UPDATE instructor set dl_number='$dl_number' where sincard='$sincard'");

if((!$sc) || (!$si)){?>
			<div class="gagal">

Error: Sorry, We cant't update the information !
		</div>
<?php

 }else{ ?>
<div class="informasi">
Success: Instructor information has been updated
		</div>
<?php 
header("Refresh: 3; url=employee.php");

}
 }

function edit_receptionist($sincard,$date_birth,$address,$city, $postal, $phone_num,$last_name,$first_name,$gender,$username,$password)
{
	/*stripslashes is a function that remvoes any slashes
	in the given input, used to prevent SQL injection*/
	include 'includes/connect.php';


$sc=mysqli_query($dbhandle,"UPDATE people set date_birth='$date_birth', address='$address', city='$city', postal='$postal', phone_num='$phone_num', last_name='$last_name',  first_name='$first_name',  gender='$gender' where sincard='$sincard'");

$si=mysqli_query($dbhandle,"UPDATE receptionist set username='$username', password='$password' where sincard='$sincard'");

if((!$sc) || (!$si)){?>
			<div class="gagal">

Error: Sorry, We cant't update the information !
		</div>
<?php

 }else{ ?>
<div class="informasi">
Success: Receptionist information has been updated
		</div>
<?php 
header("Refresh: 3; url=employee.php");

}
 }


?>

