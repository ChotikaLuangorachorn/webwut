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

    <title>Organizer | Adding Event</title>
</head>
<body>

<?php require_once "header.php" ?>

<!-- Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="headings my-4 p-4">Adding Event</h1>
    <!-- Wrapper -->
    <div class="event-wrapper p-4">
        <!-- form -->
        <form class="col-10 offset-1 needs-validation" method="post"
              enctype="multipart/form-data"
              action="eventAppender.php" novalidate>
            <!-- Event Name -->
            <?php require 'event-form-components/php/event-name.php' ?>
            <!-- Type of Event -->
            <?php require 'event-form-components/php/event-type.php' ?>
            <!-- Event Detail -->
            <?php require 'event-form-components/php/event-detail.php' ?>
            <!-- Event Thumbnail -->
            <?php require 'event-form-components/php/event-thumbnail.php' ?>
            <!-- Event Date -->
            <?php require 'event-form-components/php/event-date.php' ?>
            <!-- Event Entries -->
            <?php require 'event-form-components/php/event-entries.php' ?>
            <!-- Event Preconditions -->
            <?php require 'event-form-components/php/event-preconditions.php' ?>
            <!-- Attending Cost -->
            <?php require 'event-form-components/php/event-attending-cost.php' ?>
            <!-- Location -->
            <?php require 'event-form-components/php/event-location-info.php' ?>
            <!-- Google Form Link -->
            <?php require 'event-form-components/php/event-google-form.php' ?>
            <!-- Submit -->
            <div class="form-group row col-sm-8 offset-sm-2">
                <div class="col-centered">
                    <button type="submit" class="btn btn-primary m-1"
                            id="add-event-btn">
                        Add
                        Event
                    </button>
                    <button type="button" class="btn btn-secondary m-1"
                            id="discard-event-btn"
                            onclick="window.location.replace('orgHomepage.php')">
                        Cancel
                    </button>
                </div>
            </div>
            <!-- /.form -->
        </form>
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


<!-- Google Maps JS API -->
<!-- Map Marker -->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFDllUC_ofU2tABnCon3X-WUfPtjS4H_o&callback=initMap">
</script>
<script src="event-form-components/js/google-marker.js"></script>

<!-- Event Validator-->
<script src="event-form-components/js/event-validator.js"></script>
<!-- Event Thumbnail Preview-->
<script src="event-form-components/js/event-thumbnail-preview.js"></script>
<!-- Event Checkbox -->
<script src="event-form-components/js/event-checkbox.js"></script>
</body>
</html>


