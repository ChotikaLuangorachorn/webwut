<?php
    include("./connectDB.php");

    $username = $_POST['reg_username'];
    $password = crypt($_POST['reg_password'], '$webwut$');
    $con_password = $_POST['reg_password_confirm'];
    $firstname = $_POST['reg_fullname'];
    $lastname = $_POST['reg_lastname'];
    $age = $_POST['reg_age'];
    $email = $_POST['reg_email'];
    $mobile_no = $_POST['reg_mobile_no'];
    $gender = $_POST['reg_gender'];
    $role = 'AT';


    $query1 = "INSERT INTO `user` (`userID`,`password`,`role`) 
        VALUES ('".$username."','".$password."','".$role."')";
    $statement = $conn->exec($query1);
    echo " ------new Attendant------- ";
    echo $gender;
    $userID = $conn->lastInsertId();
    $query2 = "INSERT INTO `personal_info` (`userID`, `firstName`,`lastName`,`age`,`email`,`phoneNo`,`gender`) 
        VALUES ('$userID', '".$firstname."','".$lastname."','".$age."','".$email."','".$mobile_no."','".$gender."')";
    $statement = $conn->exec($query2);
    echo " --------create new attendant-------- "
?>