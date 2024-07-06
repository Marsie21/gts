<?php  
	include("partials/session.php");
  	
  	$action = $_POST['action'];
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  

	if($action === "users info") {
		$sql = "UPDATE users SET ".$column_name."='".$text."' WHERE username='".$login_session."'";  
	
		mysqli_query($db, $sql);

	} elseif($action === "job info") {
		$sql2 = "SELECT id FROM users WHERE username = '$login_session'";

		$result = mysqli_query($db, $sql2);
		$id = $result->fetch_assoc();

		$sql3 = "UPDATE user_job_info SET ".$column_name."='".$text."' WHERE users_id ='".$id['id']."'"; 

		mysqli_query($db, $sql3);
	}   
 ?>