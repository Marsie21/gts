<?php
  header('Content-Type: application/json');
  include('partials/config.php');

    if($_POST["view"] != '') {

       $update_sql = "UPDATE events SET event_status = 1 WHERE event_status=0";
       mysqli_query($db, $update_sql);

    }

    $sql = "SELECT * FROM events WHERE display = 'Yes ' LIMIT 5";
    $result = mysqli_query($db, $sql);
    $output = '';

    if(mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_array($result)) {

      $output .= '
      <li>
      <a href="#">
      <strong>'.$row["event_title"].'</strong><br />
      <small><em>'.$row["event_description"].'</em></small>
      </a>
      </li>

      ';
    }
  }

  else{
      $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
  }

  $status_sql = "SELECT * FROM events WHERE display = 'Yes ' && event_status = 0 ";
  $result2 = mysqli_query($db, $status_sql);
  $count = mysqli_num_rows($result2);

  $data = array(
     'notification' => $output,
     'unseen_notification'  => $count
  );

  echo json_encode($data);

?>