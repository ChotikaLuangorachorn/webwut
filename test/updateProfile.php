<?php
// Check if image file is a actual image or fake image
session_start();
if(isset($_FILES["image"])) {
    $UID = $_SESSION["ID"];
    $target_dir = "image/";
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    $target_file = $target_dir . "profile-".$UID.".".$imageFileType;
    $uploadOk = 1;
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            include 'connectDB.php';
            if (isset($conn)) {
                $sql = "UPDATE personal_info SET image=? WHERE userID=?";
        
                $statement = $conn->prepare($sql); 
                $statement->execute([$target_file, $UID]);
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
header('location:profile.php');

?>