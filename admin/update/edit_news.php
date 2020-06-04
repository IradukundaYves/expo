<?php
	include("DataBaseConnection.php");
	if (isset($_POST['updateNews'])) {


		//set parameters
		$title =$_REQUEST['news_title'];
		$body = $_REQUEST['news_body'];
		$category = $_REQUEST['news_category'];
		$source = $_REQUEST['news_source'];
		$image = "../images/".basename($_FILES['news_image']['name']);
		$id = $_POST['update_id'];
		// prepare an insert statement
		$sql = "UPDATE tbl_news SET news_title=?, news_body=?, news_category=?, news_image=?,news_source=? WHERE news_id=?";
		if($stmt = $conn ->prepare($sql)){
			// bind variable to the statement as parameters
			$stmt->bind_param("sssssi", $title,$body,$category,$image,$source,$id);

			if (!empty($title) && !empty($body) && !empty($category) && !empty($image) && !empty($source)) {
				move_uploaded_file($_FILES['news_image']['tmp_name'], $image);

				if($stmt->execute()){
						echo '<script>alert("News Updated Successfully");</script>';
						echo "<meta http-equiv='refresh' content='0;url=../news.php'>";
				}else{
					echo '<script>alert("ERROR: could not prepare query: " .$conn->error;</script>';
					echo "<meta http-equiv='refresh' content='0;url=../news.php'>";
				}
			}else{
				echo '<script>alert("all field can not be empty");</script>';
				echo "<meta http-equiv='refresh' content='0;url=../news.php'>";
			}

		}

		//close prepared statement
		$stmt->close();
		//close connection
		$conn->close();

	}


?>
