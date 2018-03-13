<?php
require_once "header.php";

/*   login session >>>
 *  "ID" = orgID,
 *  "ROLE" = "OR",
 *  "displayName" = orgName
 * */

if($_SESSION["ROLE"] !== "OR"){
    header("Location: index.php");
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/organizer.css">

    <title>Organizer | Event Homepage</title>
</head>
<body>

<?php
require_once "services/connectDB.php";
require_once "organizer/php-scripts/Event.php";
require_once "organizer/php-scripts/EventAttendee.php";
require_once "organizer/php-scripts/event-loader.php";
// If unset eventID in session
if (isset($_SESSION["eventID"]) && !empty($_SESSION["eventID"])) {
    unset($_SESSION["eventID"]);
}
?>

<!-- Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="headings my-4 p-4">Events
        <small>from Organizer &raquo; <?php echo $_SESSION["displayName"] ?></small>
    </h1>

    <!-- Wrapper -->
    <div class="row">
        <!-- Add Events Button-->
        <div class="col-md-3 p-4">
            <button type="button" class="btn btn-primary btn-lg btn-block p-3"
                    id="add-event-btn" data-toggle="modal"
                    data-target="#addEventModal">Add Event
            </button>
            <!-- Add Event Modal -->
            <?php
            $modalID = "addEventModal";
            $modalTitle = "Adding Event...";
            $modalBody = "Do you want to add a new event??";
            $modalCancelButton = "<button type=\"button\" class=\"btn btn-secondary button-modal\" 
                        data-dismiss=\"modal\">No</button>";
            $modalConfirmButton = "<a class=\"btn btn-primary button-modal\" href=\"event-form.php\">Yes</a>";
            require "organizer/php-scripts/modal.php"; ?>
        </div>
        <!-- Events holder-->
        <div class="col-md-9 mx-auto p-4 container-fluid row">
            <?php if (count($events) <= 0) { ?>
            <!-- No data -->
            <div class="event-holder p-4 invisible">
                <?php } else { ?>
                <!-- Have some data -->
                <div class="event-holder p-4">
                    <?php
                    for ($i = 0; $i < count($events); $i++) { ?>
                        <!-- Event <?php echo $i + 1 ?> -->
                        <?php
                        $recentEvent = $events[$i];
                        require "organizer/homepage-components/homepage-card.php";
                    }
                    } ?>
                    <!-- /.row -->
<?php
// 'Temporary' remove paginator
//                    <!-- Pagination -->
//                    <ul class="pagination justify-content-center">
//                        <li class="page-item">
//                            <a class="page-link" href="#" aria-label="Previous">
//                                <span aria-hidden="true">&laquo;</span>
//                                <span class="sr-only">Previous</span>
//                            </a>
//                        </li>
//                        <li class="page-item">
//                            <a class="page-link" href="#">1</a>
//                        </li>
//                        <li class="page-item">
//                            <a class="page-link" href="#">2</a>
//                        </li>
//                        <li class="page-item">
//                            <a class="page-link" href="#">3</a>
//                        </li>
//                        <li class="page-item">
//                            <a class="page-link" href="#" aria-label="Next">
//                                <span aria-hidden="true">&raquo;</span>
//                                <span class="sr-only">Next</span>
//                            </a>
//                        </li>
//                    </ul>
?>
                    <!-- /.row -->
                </div>
                <!-- /.event holder -->
            </div>
            <!-- /.wrapper -->
        </div>
        <!-- /.container -->
    </div>
</body>
</html>