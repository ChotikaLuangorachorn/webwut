<?php
// Check if image file is a actual image or fake image
session_start();
include 'connectDB.php';
if($_FILES["image"]["name"] != "") {
    $UID = $_SESSION["ID"];
    $target_dir = "../assets/users/";
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    $new_file_name = "profile-".$UID.".".$imageFileType;
    $target_file = $target_dir .  $new_file_name;
    $uploadOk = 1;
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    echo $_FILES["image"]["tmp_name"];
    echo $target_file;
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            if (isset($conn)) {
                $sql = "UPDATE personal_info SET image=? WHERE userID=?";
        
                $statement = $conn->prepare($sql); 
                $statement->execute([$new_file_name, $UID]);
                echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
}
if (array_key_exists("submit", $_POST)) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $display_name = $_POST['display_name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $userID = $_SESSION['ID'];
    $sql = "SELECT email FROM personal_info WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $checkEmail = $stmt->fetch(PDO::FETCH_OBJ);
    if ($checkEmail === FALSE) {
        $sql = "UPDATE personal_info SET firstName=?,lastName=?,email=?,phoneNo=? WHERE userID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$first_name, $last_name, $email, $tel, $userID]);
        echo "success personal info with email";
    } else {
        $sql = "UPDATE personal_info SET firstName=?,lastName=?,phoneNo=? WHERE userID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$first_name, $last_name, $tel, $userID]);
        echo "success personal info without email";
    }
    $sql = "SELECT displayName FROM personal_info WHERE displayName=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$display_name]);
    $checkDisplayName = $stmt->fetch(PDO::FETCH_OBJ);
    if ($checkDisplayName === FALSE) {
        $sql = "UPDATE personal_info SET displayName=? WHERE userID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$display_name, $userID]);
        echo "success display name";
    } else {
        
    echo "fail display name";
    }
    
}

header('location:../profile.php');

?>