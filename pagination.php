<?Php 
    include("partials/session.php");    

    $page = 1;

    if(isset($_POST["page"])) {  
        $page = $_POST["page"];  
    } else {  
        $page = 1;  
    }  
    // set the number of items to display per page
    $items_per_page = 9;

    // build query
    $offset = ($page - 1) * $items_per_page;

    $yr_sql = "SELECT year_graduated FROM users WHERE username = '$login_session' ";
   
    $yr_result = mysqli_query($db, $yr_sql);
    $batch = mysqli_fetch_assoc($yr_result);

    $sql = "SELECT * FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id WHERE year_graduated = ". $batch["year_graduated"] ." ORDER BY lastname ASC LIMIT " . $offset . ", " . $items_per_page;
 
    $result = mysqli_query($db, $sql);

    //query for all data.
    $sql2 = "SELECT * FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id WHERE year_graduated = ". $batch["year_graduated"] ." " ;

    $result2 = mysqli_query($db, $sql2);
    $count2 = mysqli_num_rows($result2);

    $sql3 = "SELECT * FROM user_business";
    $result3 = mysqli_query($db, $sql3);
    $business = mysqli_fetch_assoc($result3);

    $output = '';

    if (mysqli_num_rows($result) > 0) {
        while($alumni = mysqli_fetch_assoc($result)){
            $output .= "
                <div class='alumni-card col-md-4'>
                    <div class='card profile-card'>
                        <div class='header-card'>
                            <div id='img-profile'>
                                <img src='".$alumni['profile_img']."'>;
                            </div>
                        </div>
                        <div class='profile-info'> 
                            <p><b>".ucwords($alumni['lastname']).", ".ucwords($alumni['firstname'])." ".ucwords($alumni['middlename'])."</b></p>
                            <p>".ucwords($alumni['course'])."</p>
                            <p>".ucwords($alumni['company_name'])."</p>
                            <p>".ucwords($alumni['company_position'])."</p>
                            <div class='line'></div>
                            <p>".$alumni['email']."</p>
                            <p>"."contact # ".$alumni['contact']."</p>
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
        $output .= "0 results";
    } 

    $new_count = ceil($count2 / $items_per_page);
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

?>