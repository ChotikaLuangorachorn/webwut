<?php
// Check if image file is a actual image or fake image
session_start();
if(isset($_FILES["image"])) {
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
            include 'connectDB.php';
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
// header('location:../profile.php');

?>