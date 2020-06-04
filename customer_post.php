<?php
    include('admin/DataBaseConnection.php');

    if (isset($_POST['saveProduct'])) {

      $sql="INSERT INTO tbl_products(product_name,product_description,product_image,company_name,business_ID,reg_date) VALUES(?,?,?,?,?,NOW())";
      if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("ssssi",$name,$descr,$p_img,$company,$business_id);

        //setting parameters
        $name = $_POST['product_name'];
        $descr = $_POST['product_description'];
        $company = $_POST['company_name'];
        $business_id = $_POST['business_id'];
        $p_img = "../p_img/".basename($_FILES['product_image']['name']);
        
        if (!empty($name) && !empty($descr) && !empty($p_img) && !empty($company) && !empty($business_id)) {

          move_uploaded_file($_FILES['product_image']['tmp_name'], $job_img);

          // RUN INSERT QUERY
          if ($stmt->execute()) {
            echo '<script>alert("Posted Successfully");</script>';
            echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";

          }else{
            echo '<script>alert("Failed to Post ");</script>';
            echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
          //echo "error".$conn->error;
          }
        }else{
          echo '<script>alert("All fields are required");</script>';
          echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
          //echo "error .$sql".$conn->error;
        }
      }else{
        echo '<script>alert("Something Went Wrong");</script>';
        echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
        //echo "error".$conn->error;
      }

      //close statement
      $stmt->close();

      //close the connection
      $conn->close();

    }

?>
