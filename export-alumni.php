<?php
	include("partials/config.php");
 	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=alumni-list.csv');
	 
	// do not cache the file
	header('Pragma: no-cache');
	header('Expires: 0');
	 
	// create a file pointer connected to the output stream
	$file = fopen('php://output', 'w');

	fputcsv($file, array('Student Number', 'Username', 'Email', 'Firstname', 'Middlename', 'Lastname', 'Address', 'Contact info', 'Employed', 'Year Graduated', 'Course', 'Company name', 'Company position', 'Monthly salary'));

	$sql = 'SELECT student_id, username, email, firstname, middlename, lastname, address, contact, emp_status, year_graduated, course, company_name, company_position, monthly_salary FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id';  
	 
	if ($result = mysqli_query($db, $sql)) {

		while ($alumni = mysqli_fetch_assoc($result)) {
			fputcsv($file, $alumni);
		}

	}

	mysqli_close($db);
?>