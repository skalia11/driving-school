<?php
/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/
session_start();
if(!isset($_SESSION['user'])){
header('Location:index.php');
} ?>
  
<?php 
include 'includes/dashboard_header.php';	
include 'includes/connect.php';
?>
</head>
  <body>

<?php 	
$sin = (isset($_GET['sincard']) ? $_GET['sincard'] : null);
	if(isset($_POST['submit'])){
	$sqlget= mysqli_query($dbhandle,"DELETE from people where people.sincard='$sin'");
		
		if($sqlget){

			echo $sin."Information has been deleted successfully !";
		}else{
			echo "Sorry, there is an error. Please try again later !";
}
}
	if($sin){

$sqlget= mysqli_query($dbhandle,"SELECT first_name, balance,address,city,postal,last_name,dl_number,phone_num,date_birth,gender FROM PEOPLE  join student on student.sincard=people.sincard where people.sincard ='$sin'");
$sqlshow=mysqli_fetch_assoc($sqlget);


?>

<h1>Delete Confirmation </h1>
<hr />

<table  align="center" color="blue" border="4">

<h2> Are you sure you want to delete 
	<font color='red'>
		<?php echo ucfirst($sqlshow['first_name'])."</font> and all "; 
	if($sqlshow['gender']=="M"){ 
		echo "his";
	} 
		else { 
			echo "her";
		} 
			echo " information from the system ?";


?>
</table><hr />
<button class="btn" id="demo"  type="submit" name="submit" formmethod="GET" data-url="d.php?sincard=<?php echo $sin;?>">Yes, Delete</button>
<button id="close-nicemodal"  class="btn">No, Close</button>
</form>

<?php 
} 

?>
<div>
<br /></div>
<script>
$(function(){

    $('button#demo').nicemodal({
        width: '500px',
        keyCodeToClose: 27,
        defaultCloseButton: true,
        idToClose: '#close-nicemodal',
        closeOnClickOverlay: true,
        closeOnDblClickOverlay: true,
        // onOpenModal: function(){
        //     alert('Opened');
        // },
        // onCloseModal: function(){
        //     alert('Closed');
        // }
    });
});
</script>


</body>
	</html>