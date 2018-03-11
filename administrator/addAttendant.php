<?php
    include("./connectDB.php");

    $username = $_POST['userID'];
    $password = crypt($_POST['pwd'], '$webwut$');
    $con_password =  $password;
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $mobile_no = $_POST['phone'];
    $gender = $_POST['gender'];
    $role = 'AT';


    //check username & email ไม่ซ้ำ
    $query_check = "SELECT * FROM `personal_info` LEFT JOIN `user` ON personal_info.userID = user.id 
        WHERE personal_info.email='".$email."' AND user.userID='".$username."'";
    $statement_check = $conn->query($query_check);
    $row_check = $statement_check->fetchAll(PDO::FETCH_OBJ);
    if (sizeof($row_check) > 0) {
        echo "username and email has already !!";
    } else {
    $query1 = "INSERT INTO `user` (`userID`,`password`,`role`) 
        VALUES ('".$username."','".$password."','".$role."')";
    //insert username to DB
    $statement = $conn->exec($query1);
    echo " --new Attendant-- ";
    echo $gender;
    $userID = $conn->lastInsertId();
    $query2 = "INSERT INTO `personal_info` (`userID`, `firstName`,`lastName`,`age`,`email`,`phoneNo`,`gender`) 
        VALUES ('$userID', '".$firstname."','".$lastname."','".$age."','".$email."','".$mobile_no."','".$gender."')";
    //insert info to DB
    $statement = $conn->exec($query2);
    echo " ---create new attendant--- ";
    }
    

?>