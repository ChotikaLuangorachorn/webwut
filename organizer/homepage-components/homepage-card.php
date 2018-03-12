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
        <!-- Event Start Date -->
        <p class="card-text">
            <span>Event Start: </span>
            <?php echo date("d/m/Y", $recentEvent->getStartDate()) ?>
        </p>
        <!-- Event End Date -->
        <p class="card-text">
            <span>Event End: </span>
            <?php echo date("d/m/Y", $recentEvent->getEndDate()) ?>
        </p>
        <!-- Registrable Date -->
        <p class="card-text">
            <span>Can register until: </span>
            <?php echo date("d/m/Y", $recentEvent->getRegistrableDate()) ?>
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
        <!-- Survey Form -->
        <p class="card-text">
            <span>Survey Form: </span>
            <?php echo $recentEvent->getSurveyLink() ?>
        </p>
        <!-- Button options -->
        <?php require 'homepage-card-button.php' ?>
        <small>Created when:
            <?php echo date("d/m/Y \a\\t H:i:s A",
                $recentEvent->getCreateDate()
            ) ?>
        </small>
    </div>
</div>
<hr/>