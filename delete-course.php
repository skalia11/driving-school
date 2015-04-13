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
include 'includes/dashboard_header.php';	?>

</head>
  <body>

<h1>Delete </h1>
<hr />

<table  align="center" color="blue" border="4">

<h2>  
	<?php 

/*this function takes in its parameters all the necessary 
variables that are needed to delete an existing attribute 
in the student query*/

	
$cid = (isset($_GET['cid']) ? $_GET['cid'] : null);
	if(isset($_GET['cid'])){

		include 'includes/connect.php';
		$sqlget= mysqli_query($dbhandle,"DELETE from courses where courses.id_course='$cid'");
		
		if($sqlget){

			echo "Course has been deleted successfully !";
		}else{
			echo "Sorry, there is an error. Please try again later !";
}
}
?></h2>
</table><hr />
<button id="close-nicemodal"  class="btn">Close</button>
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
        closeOnDblClickOverlay: false,
        onOpenModal: function(){
        confirm('You really want to delete it ?');
        },
          onCloseModal: function(){
            window.location.href='courses.php';

         }
        

    });
});
</script>


</body>
	</html>