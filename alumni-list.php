<?Php 
    require_once('partials/admin-header.php');
?>

        <div id="content">
            <div class="form-group input-group col-md-12">
                <input class="form-control search-box" type="search" placeholder="Search" name="search">
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
                        <div class="checkbox">
                            <label><input type="checkbox" class="filter-by" name="filter[]" value="Firstname" checked> Firstname</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" class="filter-by" name="filter[]" value="Lastname"> Lastname</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" class="filter-by" name="filter[]" value="Middlename"> Middlename</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" class="filter-by" name="filter[]" value="Course"> Course</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="line"></div>
                <form action="export-alumni.php" method="post" style="float: right">
                    <button type="submit" class="csvExport">Export CSV file &nbsp;<span class="glyphicon glyphicon-export"></span></button>
                </form>
            <div class="alumni-container">
                <div class="row">
                    <div class="alumni-header">
                        <h3>List of Alumni</h3>
                    </div>
                </div>
                <div class="row">
                    <div class='profile-card-container'>
                        <!-- INSERT ALUMNI here -->
                    </div>
                </div>
                
            </div>
    </div>
<?Php 
    require_once('partials/admin-footer.php');
?>