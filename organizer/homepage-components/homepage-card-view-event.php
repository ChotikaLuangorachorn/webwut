<a href="<?php echo "assets/events/" .
    $recentEvent->getThumbnail() ?>"
   data-toggle="modal"
   data-target="#viewModal">
    <!-- Event Thumbnail -->
    <img class="image-640-360 image-fit-cover
                            img-thumbnail
                            rounded mb-3
                             mb-md-0"
         src="<?php echo "assets/events/" .
             $recentEvent->getThumbnail() ?>"/>
</a>

<!-- View Event Modal -->
<?php
$eventID = $recentEvent->getEventID();

$modalID = "viewModal";
$modalTitle = "Viewing an event...";
$modalBody = "Do you want to view an event?";
$modalCancelButton = "<button type=\"button\" class=\"btn btn-secondary button-modal\"
                        data-dismiss=\"modal\">No</button>";
$modalConfirmButton = "<a class=\"btn btn-primary button-modal\" href=\"#\" data-dismiss=\"modal\">Yes</a>";

/* href should go event-viewer.php?eid=$eventID, but it's not ready */
require "organizer/php-scripts/modal.php"; ?>