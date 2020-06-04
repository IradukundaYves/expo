<?php
    //include connection
    include("../DataBaseConnection.php");


    //error message variable
    $error_msg;

    //check when button pressed
    if(isset($_POST['saveUser'])){

        //preppare the insert statement
        $sql = "INSERT INTO tbl_users(first_name,last_name,email,phone,user_name,password,user_role,created_date) VALUES(?,?,?,?,?,?,?,now())";
        if($stmt = $conn->prepare($sql)){
            //bind variable to the prepared statement as parameters
            $stmt->bind_param("sssssss", $fname,$lname,$email,$phone,$uname,$hashed_password,$urole);

            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $uname = $_POST['user_name'];
            $urole = $_POST['user_role'];
            $hashed_password = password_hash($_POST["password"],PASSWORD_DEFAULT);

            //form validation to check if there is no empty fields
            if(!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($uname) &&  !empty($hashed_password) && !empty($urole)){
                //check if user name already exist
                $query = $conn->prepare("SELECT user_name FROM tbl_users WHERE user_name=?");
                $query->bind_param("s", $_POST['user_name']);
                $query->execute();
                $query->store_result();
                if($query->num_rows > 0){
                    echo '<script>alert("Sorry, this User Name is already token!!")</script>';
                    echo "<meta http-equiv='refresh' content='0;url=../users.php'>";
                }else{
                    //attemp to execute prepared statement
                    if($stmt->execute()){
                        echo'<script>alert("New User created Successfully!")</script>';
                        echo "<meta http-equiv='refresh' content='0;url=../users.php'>";

                    }else{
                        echo'<script>alert("Sorry!! something went wrong.")</script>';
                        //echo "ERROR: Could not execute query: $sql. " . $conn->error;
                        echo "<meta http-equiv='refresh' content='0;url=../users.php'>";
                    }
                }
            }else{
                echo '<script>alert("Sorry!!, All Fields are required!")</script>';
                echo "<meta http-equiv='refresh' content='0;url=../users.php'>";

            }
        }else{
            echo'<script>alert("Sorry, could not prepare the query!")</script>';
            echo "<meta http-equiv='refresh' content='0;url=../users.php'>";
        }

        //close the statement
        $stmt->close();

        //close the connection
        $conn->close();

    }


?>
