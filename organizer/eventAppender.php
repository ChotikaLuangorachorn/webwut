<?php
require_once 'Event.php';
require_once 'Location.php';
require_once 'EventPrecondition.php';
// open session
session_start();

// Check if there was any form has been sent submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["event-thumbnail"])) {
        uploadImage($_FILES["event-thumbnail"]);
    }
    $eventData = createEventObject($_POST);
    $eventData->addThumbnail($_FILES["event-thumbnail"]["name"]);

    $_SESSION["event-data"] = $eventData;
}
// close session
session_write_close();
// redirect to organizer's homepage
header("Location: orgHomepage.php");

function createEventObject($postData)
{
    $eventName = $postData["event-name"];
    $eventType = $postData["event-selector"];
    $eventDescription = $postData["event-description"];
    $eventEntries = $postData["max-entries"];
    $age = $postData["age"];
    $gender = $postData["gender"];
    $attendingCost = $postData["attending-cost"];
    $locationName = $postData["location-name"];
    $streetNumber = $postData["street-number"];
    $route = $postData["route"];
    $subDistrict = $postData["sub-district"];
    $district = $postData["district"];
    $city = $postData["city"];
    $postalCode = $postData["postal-code"];
    $country = $postData["country"];

    $precondition = new EventPrecondition($age, $gender);
    $locationInfo = new Location($locationName, $streetNumber, $route, $subDistrict, $district, $city, $postalCode, $country);
    $event = new Event($eventName, $eventType, $eventDescription,
        $eventEntries, $precondition, $attendingCost, $locationInfo);
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