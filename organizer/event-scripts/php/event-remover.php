<?php
// open session
session_start();
require_once "../../../services/connectDB.php";
require_once "Event.php";

// close session
session_write_close();
// redirect to organizer's homepage
header("Location: ../../homepage.php"); ?>