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
<?php require_once "event-form-components/php/form-cache.php" ?>

<!-- Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="headings my-4 p-4"><?php echo $headings ?></h1>
    <!-- Wrapper -->
    <div class="event-wrapper p-4">
        <!-- form -->
        <form class="col-10 offset-1 needs-validation" method="post"
              enctype="multipart/form-data"
              action="event-scripts/php/event-creator.php" novalidate>
            <!-- Event Name -->
            <?php require 'event-form-components/php/form-name.php' ?>
            <!-- Type of Event -->
            <?php require 'event-form-components/php/form-type.php' ?>
            <!-- Event Detail -->
            <?php require 'event-form-components/php/form-detail.php' ?>
            <!-- Event Thumbnail -->
            <?php require 'event-form-components/php/form-thumbnail.php' ?>
            <!-- Registrable Date -->
            <?php require 'event-form-components/php/form-registrable-date.php' ?>
            <!-- Start Date -->
            <?php require 'event-form-components/php/form-start-date.php' ?>
            <!-- End Date -->
            <?php require 'event-form-components/php/form-end-date.php' ?>
            <!-- Event Entries -->
            <?php require 'event-form-components/php/form-entries.php' ?>
            <!-- Event Preconditions -->
            <?php require 'event-form-components/php/form-preconditions.php' ?>
            <!-- Attending Cost -->
            <?php require 'event-form-components/php/form-attending-cost.php' ?>
            <!-- GG Map -->
            <?php require 'event-form-components/php/form-map.php' ?>
            <!-- Indoor Name -->
            <?php require 'event-form-components/php/form-indoor-name.php' ?>
            <!-- Location -->
            <?php require 'event-form-components/php/form-location-info.php' ?>
            <!-- Survey Link -->
            <?php require 'event-form-components/php/form-survey-link.php' ?>
            <!-- Submit -->
            <?php require 'event-form-components/php/form-submit.php' ?>
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

<!-- Form Validator-->
<script src="event-form-components/js/form-validator.js"></script>
<!-- Form Thumbnail Preview-->
<script src="event-form-components/js/form-thumbnail-preview.js"></script>
<!-- Form Checkbox -->
<script src="event-form-components/js/form-checkbox.js"></script>
<!-- Form Modal -->
<script src="event-form-components/js/form-modal.js"></script>
</body>
</html>


