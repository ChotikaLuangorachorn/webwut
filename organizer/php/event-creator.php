<?php
// open session
session_start();
require_once "../../../services/connectDB.php";
require_once "Event.php";

if (!isset($_SESSION["orgID"])) {
    $_SESSION["orgID"] = 3;
}

// Check if there was any form has been sent submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // find the latest event id in database if it does not set

    // set organizer ID
    $orgID = $_SESSION["orgID"];

    // create & execute query
    $query = createInsertEventQuery($_POST, $orgID);
    $statement = $conn->exec($query);

    // get Event ID
    $eventID = $conn->lastInsertId();

    // If survey link exists.
    if ($_POST["event-survey-link"]) {
        $surveyLink = $_POST["event-survey-link"];

        // update survey link to DB
        $query = createInsertSurveyLinkQuery($eventID, $surveyLink);
        $statement = $conn->exec($query);
    }

    // If thumbnail exists.
    if (!empty($_FILES["event-thumbnail"])) {

        // invoke new file name from event and org ID
        $new_file_name = "event-$eventID-org-$orgID";

        // try to upload thumbnail to '../assets/events' path
        $thumbnailPath = uploadImage($_FILES["event-thumbnail"], $new_file_name);

        // if successful
        if ($new_file_name . '.' !== $thumbnailPath) {

            // upload thumbnail path to DB
            $query = createInsertThumbnailQuery($eventID, $thumbnailPath);
            $statement = $conn->exec($query);
        }
    }
}

// close session
session_write_close();
// redirect to organizer's homepage
header("Location: ../../homepage.php");

function createInsertEventQuery($postData, $orgID)
{
    $name = $postData["event-name"];
    $type = $postData["event-selector"];
    $detail = $postData["event-detail"];
    $maxEntries = $postData["max-entries"];
    $registrableDate = date("Y-m-d H:i:s", strtotime($postData["event-registrable-date"]));
    $startDate = date("Y-m-d H:i:s", strtotime($postData["event-start-date"]));
    $endDate = date("Y-m-d H:i:s", strtotime($postData["event-end-date"]));
    $age = $postData["age"];
    $gender = $postData["gender"];
    $attendingCost = $postData["attending-cost"];
    $indoorName = $postData["indoor-name"];
    $location = $postData["location"];

    $query = "INSERT INTO `event` (`orgID`,           `eventName`,  `type`,    `eventDetail`,
                                   `registrableDate`, `eventStart`, `eventEnd`,
                                   `age`,             `gender`,     `price`,   `capacity`,
                                   `indoorName`,      `location`)
                           VALUES ( $orgID,           '$name',      '$type',   '$detail',
                                   '$registrableDate','$startDate', '$endDate',
                                    $age,             '$gender',     $attendingCost, $maxEntries,
                                   '$indoorName',     '$location')";
    return $query;
}

function createInsertThumbnailQuery($eventID, $thumbnailPath)
{
    return "INSERT INTO `event_image`(`eventID`, `image`) VALUES ($eventID, '$thumbnailPath')";
}

function createInsertSurveyLinkQuery($eventID, $surveyLink)
{
    return "INSERT INTO `event_survey_link`(`eventID`, `surveyLink`) VALUES ($eventID, '$surveyLink')";
}

function uploadImage($imageFile, $new_file_name)
{
    $target_dir = "../../../assets/events/";
    $imageFileType = strtolower(pathinfo(basename($imageFile["name"]),
        PATHINFO_EXTENSION));
    $new_file_name = "$new_file_name.$imageFileType";
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
                echo "<br/>" . "The file " . $new_file_name . " has been uploaded.";
            }
        }
    }
    return $new_file_name;
}

?>