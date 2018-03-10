<?php
require_once 'Event.php';
require_once 'Location.php';
require_once 'EventPrecondition.php';

session_start();

if (isset($_SESSION["event-data"])) {
    echo "<pre>" . var_dump($_SESSION["event-data"]) . "</pre>";
}
?>
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
    <link rel="stylesheet" href="organizer.css">

    <title>Organizer | Event Homepage</title>
</head>
<body>

<?php require_once "header.php" ?>

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
            <a class="btn btn-primary btn-lg btn-block p-3" id="add-event-btn"
               href="orgAddEvent.php">Add Event</a>
        </div>
        <!-- Events holder-->
        <div class="col-md-9 mx-auto p-4 container-fluid row">
            <div class="event-holder p-4">
                <!-- Event One -->
                <div class="row">
                    <div class="col-lg-7">
                        <!-- View Event -->
                        <a href="#">
                            <img class="image-object-fit img-thumbnail rounded mb-3 mb-md-0"
                                 src="<?php echo '../assets/events/' . $_SESSION["event-data"]->getEventThumbnail() ?>"
                            >
                        </a>
                    </div>
                    <div class="col-lg-5">
                        <h3><?php echo $_SESSION["event-data"]->getEventName() ?></h3>
                        <p>
                            Description: <?php echo $_SESSION["event-data"]->getEventDescription() ?></p>
                        <p>
                            Location: <?php echo $_SESSION["event-data"]->getLocationInfo()->getLocationName() ?></p>
                        <p>Start
                            Date: <?php echo date("d-m-Y", strtotime($_SESSION["event-data"]->getEventStartDate())) ?></p>
                        <div>
                            <a class="btn btn-primary m-1" href="#">Edit
                                Event</a>
                            <a class="btn btn-primary m-1" href="#">Delete
                                Event</a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <hr>

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
<script src="headerjs.js"></script>
</body>
</html>
