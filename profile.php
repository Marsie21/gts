<?php
    require_once('partials/header.php');

    $sql = "SELECT * FROM users INNER JOIN user_job_info ON users.id = user_job_info.users_id WHERE username = '$login_session'";

    $sql2 = "SELECT * FROM users INNER JOIN user_business ON users.id = user_business.users_id2 WHERE username = '$login_session'";

    $result = mysqli_query($db, $sql);
    $result2 = mysqli_query($db, $sql2);

    $info = $result->fetch_assoc();
    $info2 = $result2->fetch_assoc();


 
    mysqli_close($db);
    
?>
    <!-- Page Content Holder -->
    <div id='content'>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-container">  
                    <div class="header">
                        <h4>Personal Information</h4>
                    </div>
                    <div class="profile-con">
                        <div class="row row1">
                            <div class="col-md-3">
                                <p><b>Fullname:</b></p>
                            </div>
                            <div class="col-md-7">
                                <p class="firstname"> <?Php echo ucwords($info['firstname'])." "; ?></p><p class="middlename"> <?Php echo ucwords($info['middlename'])." "; ?></p><p class="lastname"> <?Php echo ucwords($info['lastname'])." "; ?> </p>
                            </div>
                            <div id="edit-btn1" class ="col-md-2 edit-btn-con">
                                <p><span id="name" class='glyphicon glyphicon-pencil edit-btn'></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Address:</b></p>
                            </div>
                            <div class="col-md-7">
                                <p class="address"> <?Php echo ucwords($info['address']) ?> </p>
                            </div>
                            <div class ="col-md-2 edit-btn-con">
                                <p><span id="address" class='glyphicon glyphicon-pencil edit-btn'></span></p>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Email Address:</b></p>
                            </div>
                            <div class="col-md-7">
                               <p class="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"> <?Php echo $info['email'] ?> </p> 
                            </div>
                            <div class ="col-md-2 edit-btn-con">
                                <p><span id="email" class='glyphicon glyphicon-pencil edit-btn'></span></p>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Contact number:</b></p>
                            </div>
                            <div class="col-md-7">
                               <p class="contact"> <?Php echo $info['contact'] ?> </p> 
                            </div>
                            <div class ="col-md-2 edit-btn-con">
                                <p><span id="contact" class='glyphicon glyphicon-pencil edit-btn'></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Civil Status:</b></p>
                            </div>
                            <div class="col-md-7">
                                <p> <?Php echo $info['civil_status'] ?> </p>
                                <select class="form-control inputbox civ_stat" name="civil-status" style="display: none">
                                    <option>Single</option>
                                    <option>Married</option>
                                </select>
                            </div>
                            <div class ="col-md-2 edit-btn-con">
                                <p><span id="civ_stat" class='glyphicon glyphicon-pencil edit-btn'></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <?php if($info['emp_status'] === 'Yes')
                    echo '<div class="card card-container">  
                        <div class="header">
                            <h4>Current Job Information</h4>
                        </div>
                        <div class="job-con">
                            <div class="row row1">
                                <div class="col-md-3">
                                    <p><b>Job Position:</b></p>
                                </div>
                                <div class="col-md-7">
                                    <p class="current_job"> '.ucwords($info['company_position']).'</p>
                                </div>
                                <div id="edit-btn1" class ="col-md-2 edit-btn-con">
                                    <p><span id="curr_job" class="glyphicon glyphicon-pencil edit-btn"></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Company name:</b></p>
                                </div>
                                <div class="col-md-7">
                                    <p class="comp_name"> '.ucwords($info['company_name']).'</p>
                                </div>
                                <div class ="col-md-2 edit-btn-con">
                                    <p><span id="comp_name" class="glyphicon glyphicon-pencil edit-btn"></span></p>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Company Address:</b></p>
                                </div>
                                <div class="col-md-7">
                                   <p class="comp_address"> '.ucwords($info['company_address']).' </p> 
                                </div>
                                <div class ="col-md-2 edit-btn-con">
                                    <p><span id="comp_address" class="glyphicon glyphicon-pencil edit-btn"></span></p>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Monthly Salary:</b></p>
                                </div>
                                <div class="col-md-7">
                                   <p class="month_salary number"> '.number_format($info['monthly_salary']).' </p> 
                                </div>
                                <div class ="col-md-2 edit-btn-con">
                                    <p><span id="mon_salary" class="glyphicon glyphicon-pencil edit-btn"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>'; 
                ?>
            </div>
            <div class="col-md-4">
                <div class="card card-container profile-card">
                    <div class="header-card">
                        <div class='edit-img-container'>
                            <p><span class="glyphicon glyphicon-pencil edit-img"></span></p>
                        </div>
                        <div class='row'>
                            <div id="img-profile">
                                <img id='profile-picture' src=<?Php echo $info['profile_img'] ?>>
                            </div>
                        </div>
                        <div class='row'>
                            <div id='upload-btn-con'>
                                <button id="upload-btn" class='btn btn-primary'><span class="glyphicon glyphicon-upload"></span> Upload a Profile picture</button>
                            </div>
                        </div>
                    </div>
                    <div class="profile-info"> 
                        <p><b><?Php echo ucwords($info['lastname']) ?>, <?Php echo ucwords($info['firstname']) ?> <?Php echo ucwords($info['middlename']) ?></b></p>
                        <p><?Php echo ucwords($info['course']) ?></p>
                        <p><?Php echo ucwords($info['company_name']) ?></p>
                        <p><?Php echo ucwords($info['company_position']) ?></p>
                        <p><?Php echo $info2['self_emp_status'] === "Yes" ? ucwords($info['business_name']) : "" ?></p>
                        <p><?Php echo $info2['self_emp_status'] === "Yes" ? ucwords($info['business_nature']) : "" ?></p>
                        <p><?Php echo $info2['self_emp_status'] === "Yes" ? ucwords($info['business_role']) : "" ?></p>
                        <div class="line"></div>
                        <p><?Php echo $info['email']?></p>
                        <p><?Php echo "contact # ".$info['contact']?></p>
                    </div>
                    <!-- <div class="footer">
                        <div id="social-media">
                            <button class='btn btn-primary'>Add Social Media Links <span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="msg-dialog">
            <!-- insert message here -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="upload-img-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:15px 50px;">
                      <h4><span class="glyphicon glyphicon-upload"></span> Upload Profile Picture</h4>
                    </div>
                    <div class="modal-body" style="padding:20px 50px;">
                        <form action="" id="form" method="">
                            <div class="row">
                                <div id="upload-demo" style="display: none"></div>
                                <input type="hidden" id="imagebase64" name="imagebase64">
                                <label class="fileContainer">
                                    Upload an image to start cropping. <br>
                                    <i style="font-size: 12.5px">The image file size must be below 3 mb</i>
                                    <input type="file" id="upload" value="Choose a file" accept="image/*">
                                </label>
                            </div>
                            <div id='upload-result-con' class='row'>
                                <button class="btn btn-success upload-result" style="display: none">Upload Picture</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" id='upload-cancel' class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="" ss="glyphicon glyphicon-remove"></span> Cancel</button>
                    </div>
                </div>
            </div>
        </div> 

    </div>

<?Php require_once('partials/footer.php'); ?>

<script type="text/javascript">
    $( document ).ready(function() {
        var $uploadCrop;

        function readFile(input) {
            if (input.files && input.files[0]) {
                // file size is equal to mb
                var filesize = input.files[0].size / 1024 / 1024;
                if(filesize > 3) {
                    $('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Image file size is too large!!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(800, 0).slideUp(800, function(){
                                    $(this).remove(); 
                                }); 
                            }, 3000);
                    $(".upload-result").attr("disabled", true);
                    $("#upload-img-modal").find('form')[0].reset();
                } else {
                    $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; Valid Image file size!!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(800, 0).slideUp(800, function(){
                                    $(this).remove(); 
                                }); 
                            }, 3000);
                    $(".upload-result").attr("disabled", false);
                }
                var reader = new FileReader();          
                reader.onload = function (e) {
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    });
                    $('#upload-demo').css('display', 'block');
                    $('.upload-result').css('display', 'block');
                    $('.upload-demo').addClass('ready');
                }           
                reader.readAsDataURL(input.files[0]);
            }
        }

        $uploadCrop = $('#upload-demo').croppie({
            viewport: {
                width: 200,
                height: 200,
                type: 'circle'
            },
            boundary: {
                width: 300,
                height: 300
            }
        });

        $('#upload').on('change', function () { readFile(this); });
        $('.upload-result').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'original'
            }).then(function (resp) {
                $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: {image:resp},
                    success: function (data) {
                        $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; Profile Picture has been updated!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(800, 0).slideUp(800, function(){
                                    $(this).remove(); 
                                    location.reload();
                                }); 
                            }, 3000);
                        $("#upload-img-modal").modal('toggle');
                    }

                });
            });
    return false;
        });

    });
</script>