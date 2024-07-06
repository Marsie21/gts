<?php
//setting header to json
header('Content-Type: application/json');
include("partials/session.php");

//query to get data from the table
$sql = "SELECT year_graduated, count(*) as number_of_graduates FROM users GROUP BY year_graduated";
$sql2 = "SELECT job_related, count(*) as num_of_job_related FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id GROUP BY job_related";
$sql3 = "SELECT age, emp_status FROM users ORDER BY age";
$sql4 = "SELECT evaluation, count(*) as num_of_evaluated FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id GROUP BY evaluation";
//execute query
$result = mysqli_query($db, $sql);
$result2 = mysqli_query($db, $sql2);
$result3 = mysqli_query($db, $sql3);
$result4 = mysqli_query($db, $sql4);

//loop through the returned data
$encode = array();
$data = array();
$data2 = array();
$data3 = array();
$data4 = array();
//1st chart data
foreach ($result as $row) {
	$data[] = $row;
}
$encode['year_graduated'] = $data;
//2nd chart data
foreach ($result2 as $row) {
	if($row["job_related"] == "Yes" || $row["job_related"] == "No"){
		$data2[] = $row;
	} else {

	}
}
$encode['job_related'] = $data2;
//3rd chart data
foreach ($result3 as $row) {
	$data3[] = $row;
}
$encode['age'] = $data3;
//4th chart data
foreach ($result4 as $row) {
	if($row["evaluation"] == "Exemplary" || $row["evaluation"] == "Proficient" || $row["evaluation"] == "Needs Improvement" || $row["evaluation"] == "Unsatisfactory"){
		$data4[] = $row;
	} else {

	}
}
$encode['evaluated'] = $data4;


//free memory associated with result
$result->close();
$result2->close();
$result3->close();
$result4->close();

//close connection
mysqli_close($db);

//now print the data
print json_encode($encode);
// print json_encode($data2);