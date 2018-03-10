<?php
require_once 'Event.php';
// open session
session_start();

// Check if there was any form has been sent submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["event-thumbnail"])) {
        uploadImage($_FILES["event-thumbnail"]);
    }
    $eventData = createEventObject($_POST);
    $eventData->setThumbnail($_FILES["event-thumbnail"]["name"]);

    $_SESSION["event-data"] = serialize($eventData);
}
// close session
session_write_close();
// redirect to organizer's homepage
header("Location: orgHomepage.php");

function createEventObject($postData)
{
    $eventName = $postData["event-name"];
    $eventType = $postData["event-selector"];
    $eventDetail = $postData["event-detail"];
    $eventMaxEntries = $postData["max-entries"];
    $eventStartDate = $postData["event-start-date"];
    $age = $postData["age"];
    $gender = $postData["gender"];
    $attendingCost = $postData["attending-cost"];
    $indoorName = $postData["indoor-name"];
    $location = $postData["location"];
    $googleForm = $postData["event-google-form"];

    $event = new Event($eventName, $eventType, $eventDetail, $eventStartDate,
        $age, $gender, $eventMaxEntries, $attendingCost, $indoorName,
        $location, $googleForm);
    return $event;
}

function uploadImage($imageFile)
{
    $target_dir = "../assets/events/";
    $target_file = $target_dir . basename($imageFile["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($imageFile["tmp_name"]);
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
            if (move_uploaded_file($imageFile["tmp_name"], $target_file)) {
                echo "<br/>" . "The file " . basename($imageFile["name"]) . " has been uploaded.";
            }
        }
    }
}

?>