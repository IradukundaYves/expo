<?php
    //delete_data.php

    include('../DataBaseConnection.php');

    if(isset($_POST["id"])) {
        $query = "
        DELETE FROM tbl_users
        WHERE user_id = '".$_POST["id"]."'
        ";
        $statement = $conn->prepare($query);
        $statement->execute();

    }

?>
