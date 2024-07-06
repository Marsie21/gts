<?Php 
    require_once('partials/admin-header.php');
?>   
<div id="content">
        <!-- Page Content Holder -->
        <div class="row">
            <div class="col-md-12 card card-container">  
                <div class="header">
                    <h4>Events</h4>
                </div>
                <div class="table-responsive"> 
                    <div id="live_data"></div>
                </div>
                <br>
                <div class="evnt-btn-container">
                    <button class="addEvent">Add an Event &nbsp;<span class="glyphicon glyphicon-plus"></span></button> 
                    <form action="export-events.php" method="post">
                        <button type="submit" class="csvExport">Export CSV file &nbsp;<span class="glyphicon glyphicon-export"></span></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="msg-dialog">
            <!-- insert message here -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addEvent-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:15px 50px;">
                      <h4><span class="glyphicon glyphicon-calendar"></span> Events</h4>
                    </div>
                    <div class="modal-body" style="padding:20px 50px;">
                        <div class="form-group">
                            <label>Title of the Event</label>
                            <input type="text" class="form-control" id="evnt-title" name="evnt-title">
                        </div>
                        <div class="form-group">
                            <label>Title Description</label>
                            <textarea type="text" class="form-control" id="evnt-desc" name="evnt-desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Venue</label>
                            <input type="text" class="form-control" id="evnt-venue" name="evnt-venue">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Date of the Event</label>
                                <input type="date" class="form-control" id="evnt-date" name="evnt-date">
                            </div>
                            <div class="col-md-3">
                                <label>Starts at</label>
                                <input type="time" class="form-control" id="start_time" name="start_time">
                            </div>
                            <div class="col-md-3">
                                <label>Ends at</label>
                                <input type="time" class="form-control" id="end_time" name="end_time">
                            </div>
                        </div>
                        <br>
                        <button id="submitEvent" class="btn btn-success btn-block">Submit</button>
                        <br>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Modal confirmation-->
        <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete this?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="confirm" class="btn btn-primary" data-dismiss="modal">Okay</button>
              </div>
            </div>
          </div>
        </div>
</div>

<?Php 
    require_once('partials/admin-footer.php');
?>
