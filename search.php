<?php
  include("partials/session.php");

  if ( isset($_POST['search']) || isset($_POST['selected']) ) {
 
    $value = $_POST['search'];
    $selected = $_POST['selected'];
    
    $filter = explode(',', $selected);
    
    $page = 1;

    if(isset($_POST["page"])) {  
        $page = $_POST["page"];  
    } else {  
        $page = 1;  
    }  
    // set the number of items to display per page
    $items_per_page = 9;

    $offset = ($page - 1) * $items_per_page;
    
    // build query
    $yr_sql = "SELECT year_graduated FROM users WHERE username = '$login_session' ";
   
    $yr_result = mysqli_query($db, $yr_sql);
    $batch = mysqli_fetch_assoc($yr_result);

    if($value == ""){
      $sql = "SELECT * FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id WHERE year_graduated = ". $batch["year_graduated"] ." ORDER BY lastname ASC LIMIT " . $offset . ", " . $items_per_page;
      $result = mysqli_query($db, $sql);

      $sql2 = "SELECT * FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id WHERE year_graduated = ". $batch["year_graduated"] ." ";

      $result2 = mysqli_query($db, $sql2);
      $count = mysqli_num_rows($result2);

    } else {
      $test = "";
      $test3 = "";

      for($i=0; $i <= count($filter) - 1; $i++){
        $test .= $filter[$i].", ";
        $test2 = strlen($test) - 2;
        $test3 = substr($test,0,$test2);
      }
      // set to default if blank
      if($test3 === "") {
        $test3 = "lastname";
      }
      //sql for search
      $sql = "SELECT * FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id WHERE year_graduated = ". $batch["year_graduated"] ." && CONCAT_WS('', ".$test3.") LIKE '%$value%' LIMIT ". $offset . ", " . $items_per_page;
      $result = mysqli_query($db, $sql);
      $count = mysqli_num_rows($result);
    
    }
    //outputting all alumni realted to the user by batch
    $output = "";
    if (mysqli_num_rows($result) > 0) {
      while ($searched = mysqli_fetch_array($result)) {
           $output .= "
                <div class='alumni-card col-md-4'>
                    <div class='card profile-card'>
                        <div class='header-card'>
                            <div id='img-profile'>
                                <img src='".$searched['profile_img']."'>;
                            </div>
                        </div>
                        <div class='profile-info'> 
                            <p><b>".ucwords($searched['lastname']).", ".ucwords($searched['firstname'])." ".ucwords($searched['middlename'])."</b></p>
                            <p>".ucwords($searched['course'])."</p>
                            <p>".ucwords($searched['company_position'])."</p>
                            <p>".ucwords($searched['company_name'])."</p>
                            <div class='line'></div>
                            <p>".$searched['email']."</p>
                            <p>"."contact # ".$searched['contact']."</p>
                        </div>
                        <div class='footer'>
                            <div id='social-media'>

                            </div>
                        </div>
                    </div>
                </div>

          ";
     
      } 
    } else {
        $output .= '<div style="text-align: center; margin-left: 20px;">
                      <p>0 Results</p>
                    </div>
        ';
      } 
      $new_count = ceil($count / $items_per_page);
        $output .= '
                <div id="pagination-wrap">
                    <div class="pagination">
                ';
      for($i = 1; $i <= $new_count; $i++) {
          $output .= '
              <span class="pagination_link '.($page == $i ? "active" : "").'" id="'.$i.'">'.$i.'</span>
          ';
      }   
          $output .= '
                      </div>
                  </div>';
      echo $output;
  }

?>