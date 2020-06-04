<?php
    include('DataBaseConnection.php');

    if (isset($_POST['publishJob'])) {

      $sql="INSERT INTO tbl_jobs(job_title,job_source,job_category,job_type,job_description,job_image,deadline,published_date) VALUES(?,?,?,?,?,?,?,NOW())";
      if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("sssssss",$title,$source,$category,$job_type,$descr,$job_img,$deadline);

        //setting parameters
        $title = $_POST['job_title'];
        $descr = $_POST['job_description'];
        $category = $_POST['job_category'];
        $job_type = $_POST['job_type'];
        //$picture = $_FILES['job_image']['name'];
        $source = $_POST['job_source'];
        $job_img = "../j_img/".basename($_FILES['job_image']['name']);
        $deadline = $_POST['deadline'];
        if (!empty($title) && !empty($descr) && !empty($category) && !empty($job_type) && !empty($job_img ) && !empty($source) && !empty($deadline)) {

          move_uploaded_file($_FILES['job_image']['tmp_name'], $job_img);

          // RUN INSERT QUERY
          if ($stmt->execute()) {
            echo '<script>alert("Job Published Successfully");</script>';
            echo "<meta http-equiv='refresh' content='0;url=jobs.php'>";

          }else{
            echo '<script>alert("Failed to Publish job");</script>';
            echo "<meta http-equiv='refresh' content='0;url=jobs.php'>";
          //echo "error".$conn->error;
          }
        }else{
          echo '<script>alert("All fields are required");</script>';
          echo "<meta http-equiv='refresh' content='0;url=jobs.php'>";
          //echo "error .$sql".$conn->error;
        }
      }else{
        echo '<script>alert("Something Went Wrong");</script>';
        echo "<meta http-equiv='refresh' content='0;url=jobs.php'>";
        //echo "error".$conn->error;
      }

      //close statement
      $stmt->close();

      //close the connection
      $conn->close();

    }

?>
