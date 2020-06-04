<?php
    //delete_data.php

    include('../DataBaseConnection.php');

    if(isset($_POST["id"])) {
        $query = "
        DELETE FROM business_profiles
        WHERE business_ID = '".$_POST["id"]."'
        ";
        $statement = $conn->prepare($query);
        $statement->execute();

    }

?>
