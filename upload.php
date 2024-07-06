<?php
	include('partials/session.php');

	$data = $_POST['image'];
	list($type, $data) = explode(';', $data);
	list(, $data)      = explode(',', $data);

	$data = base64_decode($data);

	$imageName = time().'.png';
	
	if(file_put_contents('uploads/'.$imageName, $data)) {
		$profile_pic = 'uploads/'.$imageName;

		//SQL for inserting image file name
		$sql = "UPDATE users SET profile_img = '".$profile_pic."' WHERE id = '$id_session' ";

		if(mysqli_query($db, $sql)) {
	        header("location: profile.php");
	    } else {
	    	echo "Sorry, there was an error uploading your image.";
	        header("location: profile.php");
	    }
	} else {
		echo "ERROR has occured!";
	}

?>
