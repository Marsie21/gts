<?Php 
    require_once('partials/header.php');
?>

<div id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-container" >
				<h4>Send Feedback</h4>
				<div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject">
				</div>
				<div class="form-group">
                    <label>Content</label>
                    <textarea type="text" class="form-control" id="feed-content" name="feed-content"></textarea>
				</div>
				<div>
					<button id="feedback-submit" class="btn btn-primary">Submit</button>
				</div>
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