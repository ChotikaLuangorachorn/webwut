<div class="row">
    <div class="col-lg-7">
        <!-- View Event -->
        <a href="<?php echo '../assets/events/' .
            $recentEvent->getThumbnail() ?>">
            <!-- Event Thumbnail -->
            <img class="image-640-360 image-fit-cover
                            img-thumbnail
                            rounded mb-3
                             mb-md-0"
                 src="<?php echo '../assets/events/' .
                     $recentEvent->getThumbnail() ?>"/>
        </a>
    </div>
    <div class="col-lg-5">
        <!-- Event Name -->
        <h3><?php echo $recentEvent->getEventName() ?> -
            <small><?php echo $recentEvent->getTypeStr() ?></small>
        </h3>
        <!-- Event Detail -->
        <p class="card-text">
            <span>Event Detail: </span>
            <?php echo $recentEvent->getDetail() ?>
        </p>
        <!-- Event Location -->
        <p class="card-text">
            <span>Location Name: </span>
            <?php echo $recentEvent->getLocationName() ?>
        </p>
        <!-- Event Date -->
        <p class="card-text">
            <span>Start Date: </span>
            <?php echo date("d/m/Y \a\\t H:i", strtotime
            ($recentEvent->getDate())) ?>
        </p>
        <!-- Age Restriction -->
        <p class="card-text">
            <span>Age: </span>
            <?php echo $recentEvent->getAgeCondition() ?>
        </p>
        <!-- Gender Restriction -->
        <p class="card-text">
            <span>Gender: </span>
            <?php echo $recentEvent->getGenderCondition() ?></p>
        <!-- Attending Cost -->
        <p class="card-text">
            <span>AttendingCost: </span>
            <?php echo $recentEvent->getAttendingCostStr() ?>
        </p>
        <!-- Current Entries -->
        <p class="card-text">
            <span>Available Entries: </span>
            <?php echo $recentEvent->getEntries() ?>
        </p>
        <!-- Google Form -->
        <p class="card-text">
            <span>Google Form: </span>
            <a href="<?php echo $recentEvent->getLink() ?>">Link</a>
        </p>
        <!-- Button options -->
        <div>
            <a class="btn btn-primary m-1" href="#">Edit
                Event</a>
            <a class="btn btn-primary m-1" href="#">Delete
                Event</a>
        </div>
    </div>
</div>
<hr/>