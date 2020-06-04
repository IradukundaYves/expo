<?php
    //include database connection 
    include("DataBaseConnection.php");
    if(isset($_POST['signup'])){
        $name = $_REQUEST['business_name'];
        $logo = $_REQUEST['logo'];
        $location = $_REQUEST['location'];
        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email'];
        $website = $_REQUEST['website'];
        $type = $_REQUEST['type'];
        // $password = $_REQUEST['password'];
        $id = $_REQUEST['update_id'];

        //check if there is no empty fields
        if(!empty($name) && !empty($location) && !empty($phone) && !empty($email) && !empty($type)){
            
            $sql = "UPDATE business_profiles SET business_name=?,logo=?,location=?,phone=?,email=?,website=?,type=? WHERE business_ID=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssi",$name,$logo,$location,$phone,$email,$website,$type,$id);
            if($stmt->execute()){
                echo '<script>alert("The Account has been Updated Successfully")</script>';
                echo "<meta http-equiv='refresh' content='0;url=businesses.php'>";
            }else{
                echo '<script>alert("Sorry, something went wrong")</script>';
                echo "<meta http-equiv='refresh' content='0;url=businesses.php'>";
            }
          
        }else{
            echo '<script>alert("please All Fields Are Required")</script>';
            echo "<meta http-equiv='refresh' content='0;url=businesses.php'>";
        }
        
   }
   



?>