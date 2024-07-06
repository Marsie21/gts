<?php
	require_once("partials/header.php");

    $sql = "SELECT * FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id WHERE username = '$login_session'";

    $result = mysqli_query($db, $sql);
    $info = $result->fetch_assoc();
 
?>
    <div id="content">
        <div class="row">
               <?php if($info['emp_status'] === 'No')
                    echo '
                    <div class="col-md-12">
                    <div class="card card-container">
                        <div class="cjob-form">
                            <div class="header">
                                <h4>Current Job Information</h4>
                            </div>
                            <div class="job-con">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Current Job</label>
                                        <input id="current_job" type="text" class="form-control" name="current_job">
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label>Company Name</label>
                                        <input id="company_name" type="text" class="form-control" name="company_name">
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Company Address</label>
                                        <input id="company_address" type="text" class="form-control" name="company_address">
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Approximate Monthly Salary</label>
                                        <input type="text" id="monthly_salary" class="number form-control" name="monthly_salary">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>
                                         <span>Have you been employed immediately 6 months or less after graduation?</span>
                                        </label>
                                        <div class="radio">
                                            <input type="radio" name="opt6months" value="Yes"><label>Yes</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="opt6months" value="No"><label>No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>
                                            <span>In your first employment,which of the following has been your source?</span>
                                        </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkbox">
                                                  <label><input type="checkbox" name="source[]" value="National University Job Fair"> National University Job Fair</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label><input type="checkbox" name="source[]" value="Academic Department/Faculty Referral"> Academic Department/Faculty Referral</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label><input type="checkbox" name="source[]" value="Guidance Placement Referral"> Guidance Placement Referral</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label><input type="checkbox" name="source[]" value="OJT site"> OJT site</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkbox">
                                                  <label><input type="checkbox" name="source[]" value="Classified Ads (Printed/Electronic)"> Classified Ads (Printed/Electronic)</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label><input type="checkbox" name="source[]" value="Walk-in Application"> Walk-in Application</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label><input type="checkbox" name="source[]" value="Family and Friends Referral"> Family and Friends Referral</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>
                                            <span>Do you think your getting jobs related to your experience, skills and knowledge learned in National University?</span>
                                        </label>
                                        <div class="radio">
                                            <input type="radio" name="optRelatedJob" value="Yes"> <label> Yes</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="optRelatedJob" value="No"> <label> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                    <label>
                                        <span>Have you been promoted in your current job?</span>
                                    </label>
                                    <div class="radio">
                                        <input type="radio" name="optPromoted" value="Yes"> <label> Yes</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="optPromoted" value="No"> <label> No</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>
                                            <span>Based on the evaluation of your superiors, how do they rate your work performance using the scale below?</span>
                                        </label>
                                        <div class="radio">
                                            <input type="radio" name="optRated" value="Exemplary"> <label> Exemplary</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="optRated" value="Proficient"> <label> Proficient</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="optRated" value="Needs Improvement"> <label> Needs Improvement</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="optRated" value="Unsatisfactory"> <label> Unsatisfactory</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="job-submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        ';
                    ?>
                    <?php if($info['emp_status'] === 'Yes')
                        echo '
                        <div class="col-md-6">
                        <div class="card card-container">
                            <div class="header">
                                <h4>Previous Job Information</h4>
                            </div>
                            <div class="job-con">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Previous Job</label>
                                        <input type="text" class="form-control" id="prev_job" name="prev_job">
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control" id="prev_comp_name" name="prev_comp_name">
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Company Address</label>
                                        <input type="text" class="form-control" id="prev_comp_add" name="prev_comp_add">
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Monthly Salary</label>
                                        <input class="number form-control" id="prev_month_salary" name="prev_month_salary">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="prev-job-submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>  
                            </div>
                        ';
                    ?>
                </div>
            </div>
            <div class="col-md-6">  
                <div class='card card-container prev-job-card'>
                    <div class="header">
                        <h4>Previous job list</h4>
                    </div>
                    <br>
                    <div class="prev-job-list">
                    <?Php 

                        $sql2 = "SELECT * FROM user_prev_job WHERE users_id3 = ".$info['id']." ";

                        $result2 = mysqli_query($db, $sql2);
                        $output = "";

                        if($result2){
                            $output .= '
                                    <table class="table"> 
                                        <thead> 
                                            <tr>  
                                                <th width="20%" style="text-align: center;">Job Postion</th>  
                                                <th width="20%" style="text-align: center;">Company Name</th>  
                                                <th width="40%" style="text-align: center;">Company Address</th>  
                                                <th width="10%" style="text-align: center;">Monthly Salary</th>
                                                <th width="10%" style="text-align: center;">Action</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                    ';
                            if(mysqli_num_rows($result2) > 0) {  
                                while($prev_job = mysqli_fetch_array($result2)) { 
                                    $output .= '
                                            <tr>  
                                                 <td class="job_position" data-id1="'.$prev_job['id'].'">'.$prev_job["prev_position"].'</td>  
                                                 <td class="comp_name" data-id2="'.$prev_job['id'].'">'.$prev_job["prev_comp_name"].'</td>  
                                                 <td class="comp_add" data-id3="'.$prev_job['id'].'">'.$prev_job["prev_comp_add"].'</td>  
                                                 <td class="prev_month_salary" data-id4="'.$prev_job['id'].'">'.$prev_job["prev_month_salary"].'</td> 
                                                 <td id="editPrevJob"><button data-id5="'.$prev_job['id'].'" id="'.($prev_job['id']).'" class="btn edit-btn2">Edit &nbsp;<span class="glyphicon glyphicon-pencil"></span></button></td> 
                                            </tr>
                                            ';
                                }
                            } else {
                                $output .= '<tr>  
                                      <td colspan="4">Data not Found</td>  
                                 </tr>';  
                            }
                                    $output .= '
                                        </tbody>
                                    </table>
                                    ';
                        } 
                        echo $output;

                        mysqli_close($db);
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="msg-dialog">
            <!-- insert message here -->
        </div>
    </div>
<?php
    require_once("partials/footer.php");
?>
  
