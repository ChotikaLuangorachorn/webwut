<?php

require_once '../services/connectDB.php';

if(empty($_GET)){
    $headings = "Adding an Event";
} else {
    $headings = "Editing an Event";
}