<?php
	include("partials/session.php");
       
    $current_job = ucwords(mysqli_real_escape_string($db,$_POST['current_job']));
    $company_name = ucwords(mysqli_real_escape_string($db,$_POST['company_name'])); 
    $company_address = ucwords(mysqli_real_escape_string($db,$_POST['company_address']));
    $monthly_salary = mysqli_real_escape_string($db,$_POST['monthly_salary']);
    $months_after = mysqli_real_escape_string($db, $_POST['opt6months2']);
    $sources = "No source selected";
    if(isset($_POST['source2'])){
        $sources = implode(", ", $_POST['source2']);
    }
    $job_related = mysqli_real_escape_string($db, $_POST['optRelatedJob2']);
    $promoted = mysqli_real_escape_string($db, $_POST['optPromoted2']);
    $evaluation = mysqli_real_escape_string($db, $_POST['optRated2']);

    $sql = "SELECT id FROM users WHERE username = '$login_session' ";

    $result = mysqli_query($db, $sql);
    $user_id = $result->fetch_assoc();

    $sql2 = "UPDATE user_job_info SET company_position = '".$current_job."', company_name = '".$company_name."', company_address = '".$company_address."', monthly_salary = '".$monthly_salary."', 6months_after = '".$months_after."', source = '".$sources."', job_related = '".$job_related."', promoted = '".$promoted."', evaluation = '".$evaluation."' WHERE users_id = '".$user_id['id']."' ";

    if(mysqli_query($db, $sql2)) {
        
        $sql3 = "UPDATE users SET emp_status = 'Yes' WHERE username = '$login_session' ";
        mysqli_query($db, $sql3);

        echo "Success";
    } else {
        echo "Error";
    }
        
 ?> 