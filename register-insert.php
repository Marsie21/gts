<?php
	include("partials/config.php");

	  // USERS VARIABLES
	  $username = mysqli_real_escape_string($db, $_POST['username']);
	  $email = mysqli_real_escape_string($db, $_POST['email']);
	  $password = mysqli_real_escape_string($db, $_POST['password']);
	  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

	  $role = "alumni";
	  $firstname = mysqli_real_escape_string($db, $_POST['fname']);
	  $middlename = mysqli_real_escape_string($db, $_POST['mname']);
	  $lastname = mysqli_real_escape_string($db, $_POST['lname']);
	  $address = mysqli_real_escape_string($db, $_POST['address']);
	  $contact_num = mysqli_real_escape_string($db, $_POST['contact_num']);
	  $civil_status = mysqli_real_escape_string($db, $_POST['civil_stat']);
	  $gender = mysqli_real_escape_string($db, $_POST['gender']);
	  $birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
	  $year = date('Y', strtotime($birthdate));
	  $currentYr = date('Y');
	  $age = ((int)$currentYr) - ((int)$year);
	  $yr_graduated = mysqli_real_escape_string($db, $_POST['yr_graduated']);
	  $course = mysqli_real_escape_string($db, $_POST['course']);
	  $stud_num = mysqli_real_escape_string($db, $_POST['stud_num']);
	  $job_status = mysqli_real_escape_string($db, $_POST['emp_stat']);
	  
	  if($gender === "Male"){
	  	$profile_img = "images/user_male.png";
	  } elseif($gender === "Female") {
	  	$profile_img = "images/user_female.png";
	  }

	  //Checking if the user is a student of the university
	  $test_sql = "SELECT * FROM student_data WHERE student_num = '".$stud_num."' ";
	  $test_result = mysqli_query($db, $test_sql);
	  $test_values = $test_result->fetch_assoc();

	  if ($test_values["student_num"] == ucfirst($stud_num) && $test_values["student_fname"] == ucfirst($firstname) && $test_values["student_mname"] == ucfirst($middlename) && $test_values["student_lname"] == ucfirst($lastname)){

	  		// inserting data to the database
	  		$sql1 = "INSERT INTO users(student_id, username, email, password, role, firstname, middlename, lastname, address, contact, civil_status, gender, birthdate, age, emp_status, year_graduated, course, profile_img) VALUES ('$stud_num','$username', '$email', '$hashed_password', '$role','$firstname', '$middlename', '$lastname', '$address', '$contact_num', '$civil_status', '$gender', '$birthdate', '$age', '$job_status', '$yr_graduated', '$course', '$profile_img')";

	  
		  	// for validating existing username and email
		  	$sql3 = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";
		 
		  	// validation of account
		  	$result3 = mysqli_query($db, $sql3);
		  	$user = $result3->fetch_assoc();
		  	//count account results
		  	$count = mysqli_num_rows($result3);

		  	if($count == 1){
		  		$error = array();

		  		if($user['username'] == $username)
		  			$error['username'] = "username already exist";
		  			echo $error['username'];

		  		if($user['email']== $email)
		  			$error['email'] = "email is already in use";
		  			echo $error['email'];

		  	} else {
		  		if(mysqli_query($db, $sql1)) {
		  			if($job_status === "Yes"){
		  				$sql2 = "INSERT INTO user_job_info(users_id, survey_status) VALUES (".mysqli_insert_id($db).", 'Started')";
		  			} elseif($job_status === "No") {
		  				$sql2 = "INSERT INTO user_job_info(users_id, survey_status) VALUES (".mysqli_insert_id($db).", 'Finished')";
		  			}
		  			if(mysqli_query($db, $sql2)){
		  				echo "success!";
		  			}
			  	
		      	} else {
		        	$error = "Error";
		        	echo $error;
		      	}
	  		}
	  	} else {
	  		echo "You're not a student of this university!";
	  	}
	  
?>