<?php
// open session
session_start();
require_once "../../services/connectDB.php";
require_once "../Event.php";

if (!isset($_SESSION["orgID"])) {
    $_SESSION['orgID'] = 3;
}

// Check if there was any form has been sent submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // find the latest event id in database if it does not set

    // create event object
    $eventObject = createEventObject($_POST);

    if (isset($_FILES["event-thumbnail"])) {
        $thumbnailPath = uploadImage($_FILES["event-thumbnail"]);
    }
    // set event thumbnail
    $eventObject->setThumbnail($thumbnailPath);
    // set organizer ID
    $eventObject->setOrgID($_SESSION["orgID"]);

    // create & execute query
    $query = createInsertEventQuery($eventObject);
    $statement = $conn->exec($query);
}

// close session
session_write_close();
// redirect to organizer's homepage
header("Location: ../homepage.php");

function createEventObject($postData)
{
    $name = $postData["event-name"];
    $type = $postData["event-selector"];
    $detail = $postData["event-detail"];
    $maxEntries = $postData["max-entries"];
    $startDate = $postData["event-start-date"];
        $age = $postData["age"];
    $gender = $postData["gender"];
    $attendingCost = $postData["attending-cost"];
    $indoorName = $postData["indoor-name"];
    $location = $postData["location"];
    $surveyLink = $postData["event-google-form"];

    $event = new Event($name, $type, $detail, $startDate,
        $age, $gender, $maxEntries, $attendingCost, $indoorName,
        $location, $surveyLink);
    return $event;
}

function createInsertEventQuery($eventObj)
{
    $date = date("Y-m-d H:i:s", strtotime($eventObj->getDate()));
    $orgID = $eventObj->getOrgID();
    $eventName = $eventObj->getEventName();
    $detail = $eventObj->getDetail();
    $age = $eventObj->getAge();
    $gender = $eventObj->getGender();
    $attendingCost = $eventObj->getAttendingCost();
    $currentEntries = $eventObj->getCurrentEntries();
    $maxEntries = $eventObj->getMaxEntries();
    $indoorName = $eventObj->getIndoorName();
    $location = $eventObj->getLocation();
    $type = $eventObj->getEventType();
    $surveyLink = $eventObj->getSurveyLink();
    $thumbnailPath = $eventObj->getThumbnail();

    $query = "INSERT INTO `event` (`date`,       `orgID`,           `eventName`,
                                   `eventDetail`, `age`,            `gender`,
                                   `price`,       `currentCapacity`,`capacity`,
                                   `indoorName`,  `location`,       `type`,
                                   `surveyLink`,  `thumbnailPath`) 
                           VALUES ('$date',          $orgID,          '$eventName',
                                   '$detail',        $age,            '$gender',
                                    $attendingCost,  $currentEntries,  $maxEntries,
                                   '$indoorName',   '$location',      '$type',
                                   '$surveyLink',   '$thumbnailPath')";
    return $query;
}

function uploadImage($imageFile)
{
    $orgID = $_SESSION["orgID"];
    $target_dir = "../../assets/events/";
    $file_name = basename($imageFile["name"]);
    $imageFileType = strtolower(pathinfo(basename($imageFile["name"]),
        PATHINFO_EXTENSION));
    $new_file_name = "org-$orgID-$file_name";
    $target_file = $target_dir . $new_file_name;

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
    return $new_file_name;
}
?>