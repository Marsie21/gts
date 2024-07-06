<?php
	include("partials/config.php");
?>
<html>
	<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/register.css"/>
	<!-- Fonts -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
	</head>

<body>
	<div class="container">
		<form id="regForm" class="form-register card card-container" action = "" method = "">
			<div class="title">
				<h3>User Account</h3>
			</div>
			<!-- One "tab" for each step in the form: -->
			<!-- Account Creation -->
			<div class="tab">
				<div class="form-group">
		        	<label class="lbl">Email Address</label>
		            <input type="email" class="inputbox" id="email_add" placeholder="Email Address" name="email_add">
		        </div> 
		        <div class="form-group">
		        	<label class="lbl">Username</label>
		            <input type="text" class="inputbox" id="user_name" placeholder="Username" name="user_name">
		        </div> 
		        <div class="form-group">
		        	<label class="lbl">Password</label>
		            <input type="password" class="inputbox" id="password" placeholder="Password" name="password">
		        </div> 
			</div>
			<!-- Fullname -->
			<div class="tab"> 
		        <div class="form-group">
		           	<label class="lbl">First name</label>
		            <input type="text" id="firstname" class="inputbox" placeholder="First name" name="firstname">
		        </div>
		        <div class="form-group">
		            <label class="lbl">Middle name</label>
		            <input type="text" class="inputbox" id="middlename" placeholder="Middle name" name="middlename">
		        </div>
		        <div class="form-group">
		            <label class="lbl">Last name</label>
		            <input type="text" class="inputbox" id="lastname" placeholder="Last name" name="lastname">
		        </div>
		    </div>
		    <!-- Contact Information -->
			<div class="tab">
		        <div class="form-group">
		        	<label class="lbl">Home address</label>
		            <input type="text" class="inputbox" id="address" placeholder="Home address" name="address">
		        </div>   
		        <div class="form-group">
		        	<label class="lbl">Mobile number</label>
		           	<input type="text" class="inputbox" id="contact-num" placeholder="Mobile number" name="contact-num">
		        </div>
		    </div>
		    <!-- Other informations -->
		    <div class="tab">
			    <div class="form-group">
			    	<label>Civil Status</label>	
			        <select id="inputCivil-status" class="form-control inputbox" name="civil-status">
			            <option selected>-- Choose --</option>
			            <option>Single</option>
			            <option>Married</option>
			        </select>
			    </div>
			    <div class="form-group">
			     	<label>Gender</label>
			        <select id="inputGender" class="form-control inputbox" name="gender">
			            <option selected>-- Choose --</option>
			            <option>Male</option>
			            <option>Female</option>
			        </select>
			    </div>
			    <div class="form-group">
			        <label>Birthdate</label>
			        <input type="date" id="inputDate" class="inputbox" placeholder="Birthdate" name="birthdate">
			    </div>
			</div>
			<div class="tab">
				<div class="row">
			        <div class="form-group col-md-4">
			        	<label>Year Graduated</label>
			            <select id="yr-graduated" class="form-control inputbox" name="yr-graduated">
			            	<?php 
			            		$curYear = date('Y');
			            		for($i = $curYear; $i >= 1900; $i--) {
			            			echo "<option value='".$i."'>".$i."</option>";
			            		}
			            	?>
			            </select>
			        </div> 
			        <div class="form-group col-md-8">
				     	<label>Course</label>	
				        <select id="course" class="form-control inputbox" name="course">
				            <?php 
				             $sql_course = "SELECT course FROM courses_list";
				             $result_course = mysqli_query($db, $sql_course);

				             while ($courses = $result_course->fetch_assoc()) {
				              echo "<option value='".$courses['course']."'>".$courses['course']."</option>";
				             }

				            ?>
				        </select>
				    </div>
		        </div>
		        <div class="row">
		        	<div class="form-group col-md-6">
			        	<label class="lbl">Student number</label>
			            <input type="text" class="inputbox" id="stud_num" placeholder="Student number" name="stud_num">
		        	</div> 
		        </div> 
		        <div class="form-group" id="employmentStatus">
			        <label>
			        	<span>Are you presently employed?</span>
			        </label> 
			        <div class="radio">
						<input type="radio" name="optEmpStatus" value="Yes" checked> <label> Yes</label>
					</div>
					<div class="radio">
						<input type="radio" name="optEmpStatus" value="No"> <label> No</label>
					</div>
				</div>
			</div>
			<div id="error-msg2" class="alert alert-danger" role="alert" style="display: none; width: 100%; text-align:center;">
				<!-- Error Message Here -->
			</div>
			<br>
			<div style="overflow:auto;">
				<div style="float:right;">
					<button type="button" id="prevBtn" class="btn"><i class="glyphicon glyphicon-chevron-left" aria-hidden="true"></i><span> Previous</span></button>
					<button type="button" id="nextBtn" class="btn"><i class="glyphicon glyphicon-chevron-right" aria-hidden="true"></i><span> Next</span></button>
					<a class="btn btn-danger" id="cancelBtn" href="login.html"><span>Cancel </span><i class="glyphicon glyphicon-remove-sign" aria-hidden="true"></i></a>
				</div>
			</div>

				<!-- Circles which indicates the steps of the form: -->
			<div id="stepIndicator" style="text-align:center;margin-top:40px;">
				<span class="step"></span>
				<span class="step"></span>
				<span class="step"></span>
				<span class="step"></span>
				<span class="step"></span>
			</div>		
		</form>
	</div>

	<!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- register.js -->
    <script type="text/javascript" src="js/register.js"></script>

</body>
</html>