<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Loading CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/organizer.css">

    <title>Organizer | Event Homepage</title>
</head>
<body>

<?php
require_once "php/header.php";
require_once "php/Event.php";
require_once "php/EventAttendee.php";
require_once "../services/connectDB.php";

if (!isset($_SESSION["orgID"])) {
    $_SESSION["orgID"] = 3;
}

require_once "php/event-loader.php";

// check if session holds an event data
$hasData = isset($event);
?>

<!-- Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="headings my-4 p-4">Events
        <small>from Organizer#1</small>
    </h1>

    <!-- Wrapper -->
    <div class="row">
        <!-- Add Events Button-->
        <div class="col-md-3 p-4">
            <button type="button" class="btn btn-primary btn-lg btn-block p-3"
             id="add-event-btn" data-toggle="modal"
                    data-target="#addEventModal">Add Event</button>
            <!-- Add Event Modal -->
            <?php
            $modalID = "addEventModal";
            $modalTitle = "Adding Event...";
            $modalBody = "Do you want to add a new event??";
            $modalCancelButton = "<button type=\"button\" class=\"btn btn-secondary\" 
                        data-dismiss=\"modal\">No</button>";
            $modalConfirmButton = "";
            require "php/modal.php"; ?>
        </div>
        <!-- Events holder-->
        <div class="col-md-9 mx-auto p-4 container-fluid row">
            <?php if (!$hasData) { ?>
            <div class="event-holder p-4 invisible">
                <?php } else { ?>
                <div class="event-holder p-4">
                    <?php
                    for ($i =  0; $i < count($events); $i++) { ?>
                        <!-- Event <?php echo $i + 1 ?> -->
                        <?php
                        $recentEvent = $events[$i];
                        require "homepage-components/homepage-card.php";
                    }} ?>
                    <!-- /.row -->

                    <!-- Pagination -->
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                    <!-- /.row -->
                </div>
                <!-- /.event holder -->
            </div>
            <!-- /.wrapper -->
        </div>
        <!-- /.container -->
    </div>

    <!-- Loading Scripts -->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <!-- Header Script -->
    <script src="js/headerjs.js"></script>
</body>
</html>