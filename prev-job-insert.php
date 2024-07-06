<?php
	include("partials/session.php");
       
    $prev_job = ucwords(mysqli_real_escape_string($db,$_POST['prev_job']));
    $prev_comp_name = ucwords(mysqli_real_escape_string($db,$_POST['prev_comp_name'])); 
    $prev_comp_add = ucwords(mysqli_real_escape_string($db,$_POST['prev_comp_add']));
    $prev_month_salary = mysqli_real_escape_string($db,$_POST['prev_month_salary']);

    $sql = "SELECT id FROM users WHERE username = '$login_session' ";

    $result = mysqli_query($db, $sql);
    $user_id = $result->fetch_assoc();

    $sql2 = "SELECT * FROM user_prev_job WHERE users_id3 = ".$user_id['id']." ";
    $result2 = mysqli_query($db, $sql2);
    $job_list = $result2->fetch_assoc();

    

    $sql3 = "INSERT INTO user_prev_job(prev_position, prev_comp_name, prev_comp_add, prev_month_salary, users_id3) VALUES ('$prev_job', '$prev_comp_name', '$prev_comp_add', '$prev_month_salary','".$user_id['id']."')";
    
        if(mysqli_query($db, $sql3)) {
            echo "Success";
        } else {
            echo "Error";
        }  
        
    
        
 ?> 