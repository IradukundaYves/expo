<?php
    include('DataBaseConnection.php');
		if(isset($_POST['publishNews'])){

			//set parameters
            $title =$_REQUEST['news_title'];
            $body = $_REQUEST['news_body'];
            $category = $_REQUEST['news_category'];
            $source = $_REQUEST['news_source'];
            $image = "../news_img/".basename($_FILES['news_image']['name']);

			// prepare an insert statement
			$sql = "INSERT INTO tbl_news(news_title, news_body, news_category, news_image,news_source,upload_date) VALUES(?,?,?,?,?,NOW())";
			if($stmt = $conn->prepare($sql)){
                // bind variable to the statement as parameters
                $stmt->bind_param("sssss", $title,$body,$category,$image,$source);

                if (!empty($title) && !empty($body) && !empty($category) && !empty($image) && !empty($source)) {
                    move_uploaded_file($_FILES['news_image']['tmp_name'], $image);
                        
                    if($stmt->execute()){
                    //	echo "successfully";
                        echo '<script>alert("News uploaded Successfully");</script>';
                        echo "<meta http-equiv='refresh' content='0;url=news.php'>";
                        //echo "error".$conn->error;
                    }else{
                        echo '<script>alert("ERROR: could not prepare query: $sql. " .$conn->error;</script>';
                        echo "<meta http-equiv='refresh' content='0;url=news.php'>";
                        //echo "error".$conn->error;
                    }
                }else{
                    echo '<script>alert("all fields are Required");</script>';
					echo "<meta http-equiv='refresh' content='0;url=news.php'>";
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