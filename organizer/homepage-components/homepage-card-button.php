<div>
    <!-- Edit Event Button -->
    <button type="button" class="btn btn-primary m-1"
            data-toggle="modal"
            data-target="#editModal">
        Edit Event
    </button>
    <!-- Delete Event Button -->
    <button type="button" class="btn btn-primary m-1"
            data-toggle="modal"
            data-target="#deleteModal">
        Delete Event
    </button>
</div>

<!-- Edit Event Modal -->
<?php
$orgID = $_SESSION["orgID"];
$eventID = $recentEvent->getEventID();

$modalID = "editModal";
$modalTitle = "Editing an event...";
$modalBody = "Do you want to edit an event?";
$modalCancelButton = "<button type=\"button\" class=\"btn btn-secondary\"
                        data-dismiss=\"modal\">No</button>";
$modalConfirmButton = "<a class=\"btn btn-primary\" 
href=\"event-form.php?eid=$eventID&orgID=$orgID\">Yes</a>";
require "php/modal.php"; ?>

<!-- Delete Event Modal -->
<?php
$modalID = "deleteModal";
if(count($recentEvent->getAttendees()) > 0){
    // Case 1: contains any attendees: Cannot be removed
    $modalTitle = "Could not delete an event...";
    $modalBody = "You cannot delete an event if there was any attendee";
    $modalCancelButton = "";
    $modalConfirmButton = "<button type=\"button\" class=\"btn btn-primary\" 
                        data-dismiss=\"modal\">Okay</button>";
} else {
    // Case 2: No attendee: Can be removed
    $modalTitle = "Deleting an event...";
    $modalBody = "Are you sure you want to delete an event?";
    $modalCancelButton = "<button type=\"button\" class=\"btn btn-secondary\" 
                        data-dismiss=\"modal\">No</button>";
    $modalConfirmButton = "<a class=\"btn btn-primary\" href=\"event-script/php/event-remover.php?eid=$eventID&orgID=$orgID\">Yes</a>";
}

require "php/modal.php";
?>