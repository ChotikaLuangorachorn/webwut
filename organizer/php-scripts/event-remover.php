<?php
// open session
session_start();
require_once "../../services/connectDB.php";
require_once "Event.php";

if (!empty($_GET)) {
    $eventID = $_GET["eid"];

    // delete thumbnail
    $query = "DELETE FROM `event_image` WHERE `eventID` = $eventID";
    $statement = $conn->prepare($query);
    $statement->execute();

    // delete survey link
    $query = "DELETE FROM `event_survey_link` WHERE `eventID` = $eventID";
    $statement = $conn->prepare($query);
    $statement->execute();

    // delete event
    $query = "DELETE FROM `event` WHERE `eventID` = $eventID";
    $statement = $conn->prepare($query);
    $statement->execute();
}


// close session
session_write_close();
// redirect to organizer's homepage
header("Location: ../../org-homepage.php")
?>