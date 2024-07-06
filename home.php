<?php
    require_once('partials/header.php');

    $sql = "SELECT * FROM events WHERE display = 'Yes '";

    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

?>
    <!-- Page Content Holder -->
    <div id="content">
	   <div class="event">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                    <?php for($i=0; $i < $count; $i++ ) { ?>
                        <li data-target="#myCarousel" data-slide-to=<?php echo $i ?> <?php ($i == 0 ? ' class="active"' : "") ?> ></li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner">
                    <?Php 
                        $isFirst = true;
                        if (mysqli_num_rows($result) > 0) {
                            while($events = mysqli_fetch_assoc($result)){
                                echo '                                        
                                    <div class="item '.($isFirst ? ' active' : '').'">
                                        <img id="event-img" src="images/grey-banner.jpg" alt="Second Slide">
                                        <div class="carousel-caption">
                                            <h3>'.$events['event_title'].'<p style="font-size: 13px;"> @ '.$events["event_venue"].'</p></h3>
                                            <p id="dateTime">'.$events['event_date'].' / '.$events["start_time"].' - '.$events["end_time"].'</p>
                                            <p>'.$events['event_description'].'</p>
                                        </div>
                                    </div>

                                ';

                                $isFirst = false;
                            }
                        } else {
                            echo "0 results";
                         }   

                    ?>
                </div>

                <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
            </div>
        </div>
            
	    <div class="line"></div>

        <div class="form-group input-group col-md-12">
            <input class="form-control search-box" type="search" placeholder="Search for an alumni" name="search">
            <div class="input-group-btn">
                <button id="filter-btn" class="btn btn-primary">
                    <span class="glyphicon glyphicon-filter"></span> Filter
                </button>
            </div>
        </div>
        <div class="form-group input-group col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Filter by: </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label><input type="checkbox" class="filter-by" name="filter[]" value="Firstname"> Firstname</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="filter-by" name="filter[]" value="Lastname" checked> Lastname</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="filter-by" name="filter[]" value="Middlename"> Middlename</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label><input type="checkbox" class="filter-by" name="filter[]" value="Course"> Course</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="filter-by" name="filter[]" value="company_name"> Company Name</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="filter-by" name="filter[]" value="company_position"> Jobs</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label><input type="checkbox" class="filter-by" name="filter[]" value="year_graduated"> Year Graduated</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="filter-by" name="filter[]" value="business_name"> Business Name</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="line"></div>

        <div class="alumni-container">
            <div class="row">
                <div class="alumni-header">
                    <h3>List of Alumni</h3>
                </div>
            </div>
            <div class="row">
                <div class='profile-card-container'>
                    <!-- INSERT ALUMNI here pagination.php-->
                </div>
            </div>
            
        </div>

    <div class="msg-dialog">
            <!-- insert message here -->
    </div>

</div>

<?Php 
    require_once('partials/footer.php');
?>



