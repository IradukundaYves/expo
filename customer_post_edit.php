<?php
	include("admin/DataBaseConnection.php");
	if (isset($_POST['updateProduct'])) {

		//set parameters
	    $p_name =$_POST['product_name'];
	    $p_desc = $_POST['product_description'];
	    $picture = $_FILES['product_image']['name'];
	    $c_name = $_POST['company_name'];
		$p_img = "p_img/".basename($_FILES['product_image']['name']);
		$id = $_POST['update_id'];
		// prepare an insert statement
		$sql = "UPDATE tbl_products SET product_name=?, product_description=?, product_image=?, company_name=? WHERE product_id=?";
		if($stmt = $conn ->prepare($sql)){
			// bind variable to the statement as parameters
			$stmt->bind_param("ssssi", $p_name,$p_desc,$p_img,$c_name,$id);

            if (!empty($p_name) && !empty($p_desc) && !empty($picture) && !empty($c_name)) {
			    move_uploaded_file($_FILES['product_image']['tmp_name'], $p_img);

				if($stmt->execute()){
						echo '<script>alert("Product Updated Successfully");</script>';
						echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
				}else{
					echo '<script>alert("ERROR: could not prepare query: " .$conn->error;</script>';
					echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
			    }
			}else{
				echo '<script>alert("all field can not be empty");</script>';
				echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
			}
		}

		//close prepared statement
		$stmt->close();
		//close connection
		$conn->close();

	}


?>
