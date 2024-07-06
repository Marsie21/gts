<?php
	include("partials/config.php");
       
    $evnt_title = ucwords(mysqli_real_escape_string($db,$_POST['evnt_title']));
    $evnt_desc = mysqli_real_escape_string($db,$_POST['evnt_desc']); 
    $evnt_venue = mysqli_real_escape_string($db,$_POST['evnt_venue']);
    $evnt_date = mysqli_real_escape_string($db,$_POST['evnt_date']);
    $start_time = mysqli_real_escape_string($db,$_POST['start_time']);
    $end_time = mysqli_real_escape_string($db,$_POST['end_time']);

    
    $sql = "INSERT INTO events(event_title, event_description, event_venue, event_date, start_time, end_time, display) VALUES ('$evnt_title', '$evnt_desc', '$evnt_venue', '$evnt_date', '$start_time', '$end_time', 'No ')";
    echo $sql;
    if(mysqli_query($db, $sql)) {
        echo "success";
    } else {
        echo "Error";
    }
        
 ?> 