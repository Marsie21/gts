<?Php 
    require_once('partials/admin-header.php');
?>

<div id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-container" >
				<div class="row">
					<h4>Feedbacks</h4>
				</div>
				<?Php 
					$sql = "SELECT * FROM feedback ORDER BY id ASC";

					$result = mysqli_query($db, $sql);
					$output = "";

					if(mysqli_num_rows($result) > 0)  {  
					      while($feedbacks = mysqli_fetch_array($result))  
					      {  
					           $output .= '  
					                <div class="row">  
					                    <div class="col-md-12 well">
					                    	<h5>'.$feedbacks["msg_subject"].' by <p style="font-size: 12px; display: inline-block">'.$feedbacks["author"].'</p></h5>
					                    	<p>'.$feedbacks["msg_content"].'</p>
					                    </div> 
					                </div>
					           ';  
					      }  
					} else {  
					      $output .= '  
					                <div>No feedbacks received!!</div>';  
					}  
					echo $output;
				?>
			</div>
		</div>
	</div>
</div> 
          
<?Php 
    require_once('partials/admin-footer.php');
?>   