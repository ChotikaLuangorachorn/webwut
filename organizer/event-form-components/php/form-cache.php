<?php

require_once '../services/connectDB.php';

$detail = null;
$type = null;
$eventName = null;
$maxEntries = null;
$indoorName = null;
$location = null;
$surveyLink = null;

if (empty($_GET)) {
    $headings = "Adding an Event";
} else {
    $headings = "Editing an Event";
    $eventID = $_GET["eid"];

    // Invoke `eventID` in session
    $_SESSION["eventID"] = $eventID;
    $orgID = $_SESSION["orgID"];

    $query = "SELECT `eventDetail`, `eventName`, `type`, `capacity`,
              `indoorName`, `location`, `surveyLink` 
              FROM `event`
              LEFT JOIN `event_survey_link` 
              ON `event`.`eventID` = `event_survey_link`.`eventID` 
              WHERE `event`.`eventID` = $eventID
              AND `event`.`orgID` = $orgID";

    $statement = $conn->prepare($query);
    $statement->execute();
    if($statement->rowCount()){
        $eventData = $statement->fetch(PDO::FETCH_ASSOC);
        $detail = $eventData["eventDetail"];
        $type = $eventData["type"];
        $eventName = $eventData["eventName"];
        $maxEntries = $eventData["capacity"];
        $indoorName = $eventData["indoorName"];
        $location = $eventData["location"];
        $surveyLink = $eventData["surveyLink"];
    } else {
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}