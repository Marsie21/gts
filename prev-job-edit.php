<?php  
	 include("partials/config.php");

	 $id = $_POST["id"];  
	 $text = $_POST["text"];  
	 $column_name = $_POST["column_name"];  
	 $sql = "UPDATE user_prev_job SET ".$column_name."='".$text."' WHERE id='".$id."'";  

	 if(mysqli_query($db, $sql))  
	 {  
	      echo 'Data Updated';  
	 }  
 ?>