<?php
session_start();

if (array_key_exists("ID", $_SESSION) && array_key_exists("eventID", $_POST)) {
    $userID = $_SESSION['ID'];
    $eventID = $_POST['eventID'];

    include 'connectDB.php';
    if($_FILES["evidence"]["name"] != "") {
        $UID = $_SESSION["ID"];
        $target_dir = "../assets/payment/";
        $imageFileType = strtolower(pathinfo($_FILES["evidence"]["name"],PATHINFO_EXTENSION));
        $new_file_name = "payment-".$userID."-".$eventID.".".$imageFileType;
        $target_file = $target_dir .  $new_file_name;
        $uploadOk = 1;
        $check = getimagesize($_FILES["evidence"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["evidence"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["evidence"]["name"]). " has been uploaded.";
                if (isset($conn)) {
                    

                    $sql = "INSERT INTO payment(evidence) values(?)";
                    $statement = $conn->prepare($sql); 
                    $statement->execute([$new_file_name]);
                    $sql = "SELECT MAX(paymentID) as id FROM payment";
                    $statement = $conn->prepare($sql); 
                    $statement->execute();
                    $max_id = $statement->fetch(PDO::FETCH_OBJ)->id;

                    $sql = "INSERT INTO event_attendant(eventID,aID,flag,paymentID) values(?,?,?,?)";
                    $statement = $conn->prepare($sql); 
                    $statement->execute([$eventID, $UID, 0, $max_id]);
                }
    
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
    }



}


header("location:../event.php?id=".$eventID);
?>