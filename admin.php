<?Php 
    require_once('partials/admin-header.php');
?>

<div id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-container charts" >
				<canvas id="myChart"></canvas>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card card-container charts">
				<canvas id="myChart2" width="400" height="400"></canvas>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card card-container charts" >
				<canvas id="myChart3" width="200" height="200"></canvas>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card card-container charts">
				<canvas id="myChart4" width="200" height="200"></canvas>
			</div>
		</div>
	</div>
</div> 
          
<?Php 
    require_once('partials/admin-footer.php');
?>   

<!-- chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> 
<!-- dashboard.js -->
<script type="text/javascript" src="js/dashboard.js"></script>
