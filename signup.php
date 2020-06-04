<?php
   //include database connection 
   include("admin/DataBaseConnection.php");
   if(isset($_POST['signup'])){
        $name = $_REQUEST['business_name'];
        $logo = $_REQUEST['logo'];
        $location = $_REQUEST['location'];
        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email'];
        $website = $_REQUEST['website'];
        $type = $_REQUEST['type'];
        $password =  password_hash($_REQUEST['password'],PASSWORD_DEFAULT);

        //check if there is no empty fields
        if(!empty($name) && !empty($location) && !empty($phone) && !empty($email) && !empty($type) && !empty($password) ){
            // if the email is already exist in the system
            $query = "SELECT email FROM business_profiles WHERE email=?";
            $result = $conn->prepare($query);
            $result->bind_param("s",$email);
            $result->execute();
            $result->store_result();
            if($result->num_rows > 0){
            echo '<script>alert("Sorry, this Email is already registered with someone`s account!! Please try another one")</script>';
            echo "<meta http-equiv='refresh' content='0;url=home.php'>";
            }else{
                $sql = "INSERT INTO business_profiles(business_name,logo,location,phone,email,website,type,password,signup_date) VALUES(?,?,?,?,?,?,?,?,NOW())";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssss",$name,$logo,$location,$phone,$email,$website,$type,$password);
                if($stmt->execute()){
                    echo '<script>alert("Your Account hass been Created Successfully")</script>';
                    echo "<meta http-equiv='refresh' content='0;url=home.php'>";
                }else{
                    echo '<script>alert("Sorry, something went wrong")</script>';
                    echo "<meta http-equiv='refresh' content='0;url=home.php'>";
                }
        
            }
        }else{
            echo '<script>alert("please All Fields Are Required")</script>';
            echo "<meta http-equiv='refresh' content='0;url=home.php'>";
        }
        
   }
   



?>