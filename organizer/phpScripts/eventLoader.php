<?php
require_once '../services/connectDB.php';
require_once 'Event.php';

$events  = [];
$orgID = $_SESSION['orgID'];

$query = "SELECT * FROM `event` WHERE `orgID`= $orgID ORDER BY `eventID`";
$statement = $conn->prepare($query);
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $eventID = intval($row['eventID']);
    $date = date(strtotime($row['date']));
    $orgID = intval($row['orgID']);
    $eventName = $row['eventName'];
    $detail = $row['eventDetail'];
    $age = intval($row['age']);
    $gender = $row['gender'];
    $attendingCost = intval($row['price']);
    $currentEntries = intval($row['currentCapacity']);
    $maxEntries = intval($row['capacity']);
    $indoorName = $row['indoorName'];
    $location = $row['location'];
    $type = $row['type'];
    $surveyLink = $row['surveyLink'];
    $thumbnailPath = $row['thumbnailPath'];

    $event = new Event($eventName, $type, $detail, $date,
        $age, $gender, $maxEntries, $attendingCost, $indoorName,
        $location, $surveyLink);

    $event->setEventID($eventID);
    $event->setOrgID($orgID);
    $event->setThumbnail($thumbnailPath);
    $event->setCurrentEntries($currentEntries);
    array_push($events, $event);
}
