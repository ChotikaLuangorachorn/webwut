<?php
    include("./connectDB.php");

    $username = $_POST['reg_username'];
    $password = crypt($_POST['reg_password'], '$webwut$');
    $con_password = $_POST['reg_password_confirm'];
    $org_name = $_POST['reg_fullname'];
    $email = $_POST['reg_email'];
    $mobile_no = $_POST['reg_mobile_no'];
    $role = 'OR';
    echo 'password = ' . $password;


    $query1 = "INSERT INTO `user` (`userID`,`password`,`role`) 
        VALUES ('".$username."','".$password."','".$role."')";
    $statement = $conn->exec($query1);
    echo " -----new Organizer------- ";
    $userID = $conn->lastInsertId();
    $query2 = "INSERT INTO `organizer_info` (`userID`,`orgName`,`email`,`phoneNo`) 
        VALUES ('$userID.','".$org_name."','".$email."','".$mobile_no."')";
    $statement = $conn->exec($query2);
    echo " -------create new organizer-------";
?>