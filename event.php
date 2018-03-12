<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/comments.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
    <?php 
    include 'header.php';
    if (!array_key_exists("id", $_GET)) {
        header('location:oops.php');
    }
    include 'services/connectDB.php';
    if (isset($conn)) {
        $eventID = $_GET['id'];
        $sql = "SELECT * FROM event WHERE eventID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$eventID]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if ($result !== FALSE) {
            $event = $result;
        } else {
            header('location:oops.php');
        }

        $event->eventStart = date("j F Y G:i", strtotime($event->eventStart));
        $event->eventEnd = date("j F Y G:i", strtotime($event->eventEnd));
        $sql = "SELECT image FROM event_image WHERE eventID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $event->images = array();
        if ($result !== FALSE) {
            foreach ($result as $value) {
                $event->images[] = $value->image;
            }
        }
        $sql = "SELECT event_comment.userID, comment, date, role FROM event_comment JOIN user ON event_comment.userID=user.id WHERE eventID=? ORDER BY date";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $comments = array();
        if ($result !== FALSE) {
            foreach ($result as $value) {
                $value->date = date("d/m/Y g:i A", strtotime($value->date));
                $role = $value->role;
                $userID = $value->userID;
                if ($role == "AT") {
                    $sql = 'SELECT displayName FROM personal_info WHERE userID='.$userID;
                } else if ($role == "OR") {
                    $sql = 'SELECT orgName as displayName FROM organizer_info WHERE userID='.$userID;
                } else if ($role == "AD") {
                    $sql = 'SELECT userID as displayName FROM user WHERE id='.$userID;
                }
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $displayName = $stmt->fetch(PDO::FETCH_OBJ)->displayName;
                $value->name = $displayName;
                $comments[] = $value;
            }
        }
        $sql = 'SELECT age, gender FROM personal_info WHERE userID='.$_SESSION['ID'];
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $info = $stmt->fetch(PDO::FETCH_OBJ);
        $PASS_CONDITION = TRUE;
        if ($info->age < $event->age) {
            $PASS_CONDITION = FALSE;
        }
        if ($event->gender != "all" && $event->gender != $info->gender) {
            $PASS_CONDITION = FALSE;
        }
    }
    ?>
    <div class="container" id="main-content">
        <div class="col-12 padding-top" id="event">
            <div class="event-cover">
                <img class="img-responsive top-radius" style="height: 250px;" src="assets/events/<?php echo $event->images[0]; ?>">
            </div>
            <div class="content-box no-border-bottom">
                <h1 id="event-title">
                    <?php echo $event->eventName; ?>
                </h1>
                <div class="row" id="event-sub">
                    <div id="event-info" class="col-xs-12 col-sm-8">
                        <div id="event-time">
                            <i class="fa fa-clock-o fa-fw text-primary"></i><?php echo $event->eventStart." - ".$event->eventEnd; ?>
                        </div>

                        <div id="event-location">
                            <toggle id="event-map-toggle" data-toggle="collapse" href="#event-map">
                                <i class="fa fa-map-marker fa-fw text-primary"></i>
                                <?php echo $event->location; ?>
                                <i class="fa fa-caret-down text-primary"></i>
                            </toggle>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 text-right text-xs-center action-button">
                        <a class="btn btn-secondary <?php echo $PASS_CONDITION ? '' : 'disabled'; ?>" id="top-buy-tickets-btn" data-scroll="true" href="#event-ticket"><?php echo ($event->price <= 0 ? "Get Tickets" : "Buy Ticket"); ?></a>
                    </div>
                </div>
                <div id="event-map" class="collapse">
                    <div id="gmap"></div>
                </div>
            </div>
            <div id="event-detail" class="margin-top">
                <h2>Detail</h2>
                <?php echo $event->eventDetail ?>
            </div>
            <div id="event-condition" >
                <h2>Condition</h2>
                <p>Age: <?php echo $event->age==-1? "All age" : $event->age." above" ?></p>
                <p>Gender: <?php echo $event->gender=="all"? "All Gender" : "Only ".$event->gender ?></p>
                <h3 style="color: <?php echo $PASS_CONDITION ? 'green' : 'red' ?>"><?php echo $PASS_CONDITION ? "YOU DO PASS ALL OF THE CONDITIONS." : "YOU DO NOT PASS ALL OF THE CONDITIONS." ?></h3>
            </div>
            <?php echo $PASS_CONDITION ?
            '<div id="event-ticket" >
                <h2>Tickets</h2>
                <p>1 Ticket for '.($event->price==0? "Free" : $event->price." baht.").'</p>
                <a class="btn btn-outline-primary">'.($event->price==0? "Get" : "Buy").' one now</a>
            </div>':""; ?>
        </div>
        <div id="comments">
            <?php include 'services/comments.php'; ?>
        </div>
    </div>
    <script>
        function initMap() {
            gmap = document.getElementById('gmap');
            geocoder = new google.maps.Geocoder();
            map = new google.maps.Map(gmap, {
                center: {lat: -34.397, lng: 150.644},
                zoom: 15
            });
            
            google.maps.event.addListenerOnce(map, 'idle', codeAddress);
        }

        function codeAddress() {

            var address = '<?php echo $event->location; ?>';

            geocoder.geocode({
                'address': address
            }, function (results, status) {

                if (status == google.maps.GeocoderStatus.OK) {

                    // Center map on location
                    map.setCenter(results[0].geometry.location);

                    // Add marker on location
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });

                } else {
                    gmap.innerHTML = '';
                    gmap.style.display = "none";
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8OKwMaEJnFUsBBoHsvaHF_cvYoXbJydM&callback=initMap" async defer></script>
</body>
</html>