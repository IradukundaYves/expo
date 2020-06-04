<?php
    include('DataBaseConnection.php');
		if(isset($_POST['featuredUpdate'])){

            //set parameters
            $category = $_REQUEST['category'];
            $s_desc = $_REQUEST['short_description'];
            $phone = $_REQUEST['phone'];
            $side = $_REQUEST['side'];
            $img = "../p_img/".basename($_FILES['images']['name']);
            $id = $_REQUEST['update_id'];
			
			$sql = "UPDATE featured_products SET images=?,category=?,short_description=?,phone=?,side=? WHERE featured_product_id=?";
			if($stmt = $conn->prepare($sql)){
				// bind variable to the statement as parameters
				$stmt->bind_param("sssssi", $img,$category,$s_desc,$phone,$side,$id);

				if(!empty($img) && !empty($category) && !empty($s_desc) && !empty($phone) && !empty($side)){
				    
					move_uploaded_file($_FILES['images']['tmp_name'], $img);
				
					if($stmt->execute()){
					    //	echo "successfully";
				  	    echo '<script>alert("Featured Product Updated Successfully");</script>';
						echo "<meta http-equiv='refresh' content='0;url=featured-products.php'>";
						//echo "error".$conn->error;
					}else{
						echo '<script>alert("ERROR: could not prepare query: $sql. " .$conn->error;</script>';
						echo "<meta http-equiv='refresh' content='0;url=featured-products.php'>";
					}
				}else{
					echo '<script>alert("all fields are Required");</script>';
                    echo "<meta http-equiv='refresh' content='0;url=featured-products.php'>";
                    //echo"all fields are required".$conn->error;
				}
			}
			//close prepared statement
			$stmt->close();
			//close connection
			$conn->close();
	}

?>