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

        $time = strtotime($event->date);
        $event->date = date("j F Y \a\\t G:i", $time);
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
        $sql = "SELECT event_comment.userID, comment, date, role FROM event_comment JOIN user ON event_comment.userID=user.id WHERE eventID=?";
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
        var_dump($result);
    }
    ?>
    <div class="container" id="main-content">
        <div class="col-12 padding-top" id="event">
            <div class="event-cover">
                <img class="img-responsive top-radius" style="width: 100%" src="assets/events/<?php echo $event->thumbnailPath; ?>">
            </div>
            <div class="content-box no-border-bottom">
                <h1 id="event-title">
                    <?php echo $event->eventName; ?>
                </h1>
                <div class="row">
                    <div id="event-info" class="col-xs-12 col-sm-8">
                        <div id="event-time">
                            <i class="fa fa-clock-o fa-fw text-primary"></i><?php echo $event->date; ?>
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
                        <a class="btn btn-secondary" id="top-buy-tickets-btn" data-scroll="true" href="#event-tickets"><?php echo ($event->price <= 0 ? "Get Tickets" : "Buy Ticket"); ?></a>
                    </div>
                </div>
                <div id="event-map" class="collapse">
                    <div id="gmap"></div>
                </div>
            </div>
            <div id="event-detail">
                
            </div>
            <div id="event-tickets">

            </div>
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