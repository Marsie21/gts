<?php
	include("partials/session.php");
       
    $subject = ucfirst(mysqli_real_escape_string($db,$_POST['subject']));
    $feed_content = ucfirst(mysqli_real_escape_string($db,$_POST['content'])); 
    
    $sql = "SELECT id FROM users WHERE username = '$login_session' ";

    $result = mysqli_query($db, $sql);
    $user_id = $result->fetch_assoc();

    $sql2 = "INSERT INTO feedback(author, msg_subject, msg_content, users_id5) VALUES ('$login_session', '$subject', '$feed_content', '".$user_id["id"]."') ";

    if(mysqli_query($db, $sql2)) {
        echo "Success";
    } else {
        echo "Error";
    }
        
 ?> 