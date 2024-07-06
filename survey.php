<?php
	include("partials/session.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  	// OWN BUSINESS VARIABLES
	  	$self_emp_stat = mysqli_real_escape_string($db, $_POST['optSelfEmp']);

	  	// selecting ID of users and user_job_info 
		$sql = "SELECT users.id, user_job_info.uj_id FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id WHERE username = '$login_session'";
		$result = mysqli_query($db, $sql);
		$id = $result->fetch_assoc();

	  //INSERT INTO user_business
	  if($self_emp_stat === "No"){
	  	//USER JOB INFO VARIABLES
		$job_post = mysqli_real_escape_string($db, $_POST['c_post']);
		$company_name = mysqli_real_escape_string($db, $_POST['company_name']);
		$company_address = mysqli_real_escape_string($db, $_POST['company_add']);
		$monthly_salary = mysqli_real_escape_string($db, $_POST['monthly_salary']);
		$salary = str_replace(',', '', $monthly_salary);
		$months_after = mysqli_real_escape_string($db, $_POST['opt6months']);
		$sources = "No source selected";
		if(isset($_POST['source'])){
		 $sources = implode(", ", $_POST['source']);
		}
		$job_related = mysqli_real_escape_string($db, $_POST['optRelatedJob']);
		$promoted = mysqli_real_escape_string($db, $_POST['optPromoted']);
		$evaluation = mysqli_real_escape_string($db, $_POST['optRated']);

		//UPDATE THE TABLE USER_JOB_INFO
		$sql2 = "UPDATE user_job_info SET company_position = '".$job_post."', company_name = '".$company_name."', company_address = '".$company_address."', monthly_salary = '".$salary."', 6months_after = '".$months_after."', source = '".$sources."', job_related = '".$job_related."', promoted = '".$promoted."', evaluation = '".$evaluation."', survey_status = 'Finished' WHERE uj_id = '".$id['uj_id']."'";

	  	if(mysqli_query($db, $sql2)){
	  		//USER BUSINESS QUERY
	  		$sql3 = "INSERT INTO user_business(self_emp_status, users_id2) VALUES ('$self_emp_stat', '".$id['id']."')";
	  		
	  		mysqli_query($db, $sql3);
		  	header("location: home.php");

		} else {

		  	header("location: survey.html");
		}

	  } else {
	  	$business_name = mysqli_real_escape_string($db, $_POST['business_name']);
		$business_nature = mysqli_real_escape_string($db, $_POST['business_nature']);
		$business_role = mysqli_real_escape_string($db, $_POST['business_role']);
		$monthly_profit = mysqli_real_escape_string($db, $_POST['monthly_profit']);
		$business_address = mysqli_real_escape_string($db, $_POST['business_address']);
		$business_phone = mysqli_real_escape_string($db, $_POST['business_phone']);


		$sql5 = "INSERT INTO user_business(self_emp_status, business_name, business_nature, business_role, monthly_profit, business_address, business_phonenum, users_id2) VALUES ('$self_emp_stat', '$business_name', '$business_nature', '$business_role', '$monthly_profit', '$business_address', '$business_phone', '".$id['id']."')";


		if(mysqli_query($db, $sql5)){
			$sql6 = "UPDATE user_job_info SET survey_status = 'Finished' WHERE uj_id = '".$id['uj_id']."'";

			mysqli_query($db, $sql6);
			header("location: home.php");
		} else {
			header("location: survey.html");
		}
	  }
	  
	  
	  mysqli_close($db);
	}
?>