<?php
	include("partials/config.php");
	session_start();

	  	$username = mysqli_real_escape_string($db,$_POST['username']);
	  	$password = mysqli_real_escape_string($db,$_POST['password']); 
	  	
	  	$sql3 = "SELECT password FROM users WHERE username = '$username'";
	  	$result3 = mysqli_query($db, $sql3);
	  	$user_pass = $result3->fetch_assoc();
	  	$hashed_password = $user_pass['password'];

	  	if( password_verify($password, $hashed_password) ) {
	  		$sql = "SELECT id, role FROM users WHERE username = '$username' and password = '$hashed_password'";
		 	$result = mysqli_query($db,$sql);
		  	$user = $result->fetch_assoc();
		  	$count = mysqli_num_rows($result);

		  	$sql2 = "SELECT survey_status FROM user_job_info WHERE users_id = '".$user['id']."' ";
		  	$result2 = mysqli_query($db, $sql2);
		  	$status = $result2->fetch_assoc();

		  	if($count === 1) {
			  	if($user['role'] === 'admin'){
			  		$_SESSION['login_user'] = $username;
			  			echo "Admin!";
			  	} else {
			  		if($status['survey_status'] === "Finished") {
		         		$_SESSION['login_user'] = $username;
		         		echo "Successfully Logged in..!!";
			  		} else {
			  			$_SESSION['login_user'] = $username;
			  			echo "Survey!";
			  		}
			  	}
		    } else {
		      	echo "Error!!";
		    }
		
		} else {
			echo "Error!!";
		}
	  	
      	mysqli_close($db);
?>