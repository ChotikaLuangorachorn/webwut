<?php
session_start();
include 'connectDB.php';
if (array_key_exists("ID", $_SESSION) && array_key_exists("eventID", $_POST)) {
    $userID = $_SESSION['ID'];
    $eventID = $_POST['eventID'];
    
    $sql = "INSERT INTO payment() values()";
    $statement = $conn->prepare($sql); 
    $statement->execute();
    $sql = "SELECT MAX(paymentID) as id FROM payment";
    $statement = $conn->prepare($sql); 
    $statement->execute();
    $max_id = $statement->fetch(PDO::FETCH_OBJ)->id;

    $sql = "INSERT INTO event_attendant(eventID,aID,flag,paymentID) values(?,?,?,?)";
    $statement = $conn->prepare($sql); 
    $statement->execute([$eventID, $userID, 0, $max_id]);
}


header("location:../event.php?id=".$eventID);
?>