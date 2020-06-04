<?php
    //include('../DataBaseConnection.php');
		if(isset($_POST['saveProduct'])){

			//set parameters
			$p_name =$_REQUEST['product_name'];
			$p_desc = $_REQUEST['product_description'];
			$picture = $_FILES['product_image']['name'];
			$c_name = $_REQUEST['company_name'];
			//$business_id = $_REQUEST['business_id'];
			$p_img = "../p_img/".basename($_FILES['product_image']['name']);

			// prepare an insert statement
			$sql = "INSERT INTO tbl_products(product_name,product_description,product_image,company_name,reg_date) VALUES(?,?,?,?NOW())";
			if($stmt = $conn->prepare($sql)){
				// bind variable to the statement as parameters
				$stmt->bind_param("ssss", $p_name,$p_desc,$p_img,$c_name,$business_id);

				if(!empty($p_name) && !empty($p_desc) && !empty($p_img) && !empty($c_name)){
				    
					move_uploaded_file($_FILES['product_image']['tmp_name'], $p_img);
					
					if($stmt->execute()){
					    //	echo "successfully";
				  	    echo '<script>alert("Product Inserted Successfully");</script>';
						echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
						//echo "error".$conn->error;
					}else{
						echo '<script>alert("ERROR: could not prepare query: $sql. " .$conn->error;</script>';
						echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
					}
				}else{
					echo '<script>alert("all fields are Required");</script>';
					echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
				}
			}
			//close prepared statement
			//$stmt->close();
			//close connection
			$conn->close();
	}

?>
