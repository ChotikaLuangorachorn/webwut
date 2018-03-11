<?php
$events = [];
$orgID = $_SESSION["orgID"];

$query = "SELECT `event`.*, `event_image`.*, `event_survey_link`.`surveyLink` FROM `event` 
          INNER JOIN `event_image` ON `event`.`eventID` = `event_image`.`eventID` 
          INNER JOIN `event_survey_link` ON `event`.`eventID` = `event_survey_link`.`eventID` 
          WHERE `event`.`orgID` = $orgID 
          ORDER BY `event`.`eventID` DESC";

$statement = $conn->prepare($query);
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $eventID = intval($row["eventID"]);
    $date = date(strtotime($row["date"]));
    $orgID = intval($row["orgID"]);
    $eventName = $row["eventName"];
    $detail = $row["eventDetail"];
    $age = intval($row["age"]);
    $gender = $row["gender"];
    $attendingCost = intval($row["price"]);
    $maxEntries = intval($row["capacity"]);
    $indoorName = $row["indoorName"];
    $location = $row["location"];
    $type = $row["type"];
    $thumbnailPath = $row["image"];
    $surveyLink = $row["surveyLink"];

    $event = new Event($eventName, $type, $detail,
        $date, $age, $gender,
        $maxEntries, $attendingCost, $indoorName,
        $location);
    $event->setEventID($eventID);
    $event->setOrgID($orgID);
    $event->setThumbnail($thumbnailPath);
    $event->setSurveyLink($surveyLink);
    array_push($events, $event);
}

foreach ($events as $event) {
    $eventID = $event->getEventID();
    $query = "SELECT `event_attendant`.`aID`, `event_attendant`.`flag`, `event_attendant`.`paymentID`, `event_attendant`.`qrCode`, `personal_info`.`email`, `payment`.`evidence` FROM `event`
              INNER JOIN `event_attendant` ON `event`.`eventID` = `event_attendant`.`eventID`
              INNER JOIN `payment` ON `event_attendant`.`paymentID` = `payment`.`paymentID`
              INNER JOIN `personal_info` ON `event_attendant`.`aID` = `personal_info`.`userID`
              WHERE `event`.`eventID` = $eventID
              ORDER BY `event`.`eventID`";
    $statement = $conn->prepare($query);
    $statement->execute();

    while ($nested_row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $attendeeID = intval($nested_row["aID"]);
        $flag = $nested_row["flag"];
        $paymentID = intval($nested_row["paymentID"]);
        $qrCode = $nested_row["qrCode"];
        $email = $nested_row["email"];
        $evidence = $nested_row["evidence"];

        $attendeeObject = new EventAttendee();
        $attendeeObject->setAttendeeID($attendeeID);
        $attendeeObject->setFlag($flag);
        $attendeeObject->setEmail($email);
        $attendeeObject->setQRCode($qrCode);
        $attendeeObject->setPaymentID($paymentID);
        $attendeeObject->setEvidence($evidence);
        $event->pushAttendee($attendeeObject);
    }
}
