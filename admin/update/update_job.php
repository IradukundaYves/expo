<?php
	include("DataBaseConnection.php");
	if (isset($_POST['updateJob'])) {

	    //set parameters
	    $title =$_POST['job_title'];
	    $source = $_POST['job_source'];
		$category = $_POST['job_category'];
		$type = $_POST['job_type'];
	    $dercr = $_POST['job_description'];
		$job_img = "../j_img/".basename($_FILES['job_image']['name']);
		$deadline = $_POST['deadline'];
		$id = $_POST['update_id'];

		// prepare an insert statement
		$sql = "UPDATE tbl_jobs SET job_title=?, job_source=?, job_category=?,job_type=?, job_description=?, job_image=?, deadline=? WHERE job_id=?";
		if($stmt = $conn ->prepare($sql)){
			// bind variable to the statement as parameters
			$stmt->bind_param("sssssssi", $title, $source,$category,$type,$dercr,$job_img,$deadline,$id);

            if (!empty($title) && !empty($source) && !empty($category) && !empty($type) && !empty($dercr) && !empty($job_img) && !empty($deadline)) {
			    move_uploaded_file($_FILES['job_image']['tmp_name'], $job_img);

				if($stmt->execute()){
					echo '<script>alert("Job Post Updated Successfully");</script>';
					echo "<meta http-equiv='refresh' content='0;url=jobs.php'>";
				}else{
					echo '<script>alert("ERROR: could not prepare query: " .$conn->error;</script>';
					echo "<meta http-equiv='refresh' content='0;url=jobs.php'>";
			    }
			}else{
				echo '<script>alert("all field can not be empty");</script>';
				echo "<meta http-equiv='refresh' content='0;url=../jobs.php'>";
			}
	    }

		//close prepared statement
		$stmt->close();
		//close connection
		$conn->close();

	}


?>
