<?php
    //include database connection
    include("../DataBaseConnection.php");
    if(isset($_POST['updateUser'])) {

        $query = "UPDATE tbl_users SET first_name=?, last_name=?, email=?, phone=?, user_name=?, user_role=?  WHERE user_id=? ";
        if($stmt = $conn->prepare($query)){
            $stmt->bind_param("sssssssi", $fname, $lname, $email,$phone,$uname,$urole,$id);

            $id    = $_POST['update_id'];
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $uname = $_POST['user_name'];
            // $passw = $_POST['password'];
            $urole = $_POST['user_role'];

            if($stmt->execute()){
                echo '<script>alert("User Updated Successfully")</script>';
                echo "<meta http-equiv='refresh' content='0;url=../users.php'>";
            }else{
                //echo '<script>alert("failed to Updated User")</script>';
                echo "error " . $conn->error;
            }
        }else{
            echo '<script>alert("something went wrong")</script>';
        }

    }

?>
