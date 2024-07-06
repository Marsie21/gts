<?Php 
	include("partials/config.php");
	if(isset($_POST["delete_id"])){

	    //DELETE SQL
	    $sql = "DELETE FROM events WHERE id ='".$_POST["delete_id"]."'";

	    if(mysqli_query($db, $sql)) {
	       echo "YES";
	    } else {
	       echo "NO";
	    }
	}
?>