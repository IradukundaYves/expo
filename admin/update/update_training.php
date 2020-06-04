<?php
    include('DataBaseConnection.php');
	if(isset($_POST['updateTraining'])){

        //set parameters
        $title =$_REQUEST['training_title'];
        $body = $_REQUEST['training_description'];
        $category = $_REQUEST['training_category'];
        $company = $_REQUEST['trainers_company_name'];
        $image = "../images/".basename($_FILES['training_image']['name']);
        $id = $_REQUEST['update_id'];

        // prepare an insert statement
        $sql = "UPDATE tbl_trainings SET training_title=?,traning_description=?, training_image=?,trainers_company_name=?,training_category=? WHERE training_id=?";
        if($stmt = $conn->prepare($sql)){
            // bind variable to the statement as parameters
            $stmt->bind_param("sssssi", $title,$body,$image,$company,$category,$id);

            if (!empty($title) && !empty($body) && !empty($category) && !empty($image) && !empty($company)) {
                move_uploaded_file($_FILES['training_image']['tmp_name'], $image);
                    
                if($stmt->execute()){
                //	echo "successfully";
                    echo '<script>alert("Training Updated Successfully");</script>';
                    echo "<meta http-equiv='refresh' content='0;url=internship.php'>";
                    //echo "error".$conn->error;
                }else{
                    echo '<script>alert("ERROR: could not prepare query: $sql. " .$conn->error;</script>';
                    //echo "<meta http-equiv='refresh' content='0;url=internship.php'>";
                    echo "error".$conn->error;
                }
            }else{
                //echo"all fields are required";
                echo "error".$conn->error;
            }

        }else{
            echo "error".$conn->error;
        }
        //close prepared statement
        $stmt->close();
        //close connection
        $conn->close();
	}

?>