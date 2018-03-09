<?php
session_start();

/* Check if there was any form has been sent submitted*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo var_dump($_POST);
    if (isset($_FILES["event-thumbnail"])) {
        $target_dir = "../assets/events/";
        $target_file = $target_dir . basename($_FILES["event-thumbnail"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;
        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["event-thumbnail"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
            // if file already exists, delete the old file
            if (file_exists($target_file)) {
                unlink($target_file);
                $uploadOk = 1;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["event-thumbnail"]["tmp_name"], $target_file)) {
                    echo "<br/>" . "The file " . basename($_FILES["event-thumbnail"]["name"]) . " has been uploaded.";
                }
            }
        }
    }

    $_SESSION["event-data"] = $_POST;
    $_SESSION["event-thumbnail"] = $_FILES["event-thumbnail"];
}

header("Location: orgHomepage.php");
?>