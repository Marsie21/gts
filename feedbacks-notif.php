<?php
  header('Content-Type: application/json');
  include('partials/config.php');

    if($_POST["view"] == 'yes') {

       $update_sql = "UPDATE feedback SET read_status = 1 WHERE read_status = 0";
       mysqli_query($db, $update_sql);

    }

  $status_sql = "SELECT * FROM feedback WHERE read_status = 0 ";
  $result2 = mysqli_query($db, $status_sql);
  $count = mysqli_num_rows($result2);

  $data = array(
     'unseen_notification'  => $count
  );

  echo json_encode($data);


?>