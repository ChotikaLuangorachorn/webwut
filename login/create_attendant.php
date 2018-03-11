<?php
    include("./connectDB.php");

    $username = $_POST['reg_username'];
    $password = crypt($_POST['reg_password'], '$webwut$');
    $con_password = crypt($_POST['reg_password_confirm'], '$webwut$');
    $firstname = $_POST['reg_fullname'];
    $lastname = $_POST['reg_lastname'];
    $age = $_POST['reg_age'];
    $email = $_POST['reg_email'];
    $mobile_no = $_POST['reg_mobile_no'];
    $gender = $_POST['reg_gender'];
    $role = 'AT';


    //sql check username & email ไม่ซ้ำ
    $query_check = "SELECT * FROM `personal_info` LEFT JOIN `user` ON personal_info.userID = user.id 
        WHERE personal_info.email='".$email."' AND user.userID='".$username."'";
    $statement_check = $conn->query($query_check);
    $row_check = $statement_check->fetchAll(PDO::FETCH_OBJ);

    //empty filled
    if ($username != "" && $password != "" && $con_password != "" && $firstname != "" && $lastname != "" && $email != "" && $age != "" && $gender != "" && $mobile_no != "") {
        if (sizeof($row_check) > 0) {
            echo "username and email has already !!";
        } else {
            if ($password != $con_password) {
                echo "The confirm password does not match password" ;
            } else {
                $query1 = "INSERT INTO `user` (`userID`,`password`,`role`) 
                    VALUES ('".$username."','".$password."','".$role."')";
                //insert USERNAME to DB
                $statement = $conn->exec($query1);
                $userID = $conn->lastInsertId();
                $query2 = "INSERT INTO `personal_info` (`userID`, `firstName`,`lastName`,`age`,`email`,`phoneNo`,`gender`) 
                    VALUES ('$userID', '".$firstname."','".$lastname."','".$age."','".$email."','".$mobile_no."','".$gender."')";
                //insert INFO to DB
                $statement = $conn->exec($query2);
                echo " ---create new attendant--- ";
            }
        }
    } else {
        echo "Please fill data !!";
    }

?>