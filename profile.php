<?php
    // include 'checkLogin.php';
    include 'header.php'; 
    $ISOWNER = FALSE;
    if ($LOGGEDIN) {
        $ROLE = $_SESSION['ROLE'];
        $USER = $_SESSION['ID'];
        if (array_key_exists('user', $_GET)) {
            $USER = $_GET['user'];
        }
        $_GET['user'] = $USER;
        if ($USER == $_SESSION['ID']) {
            if ($ROLE == 'OR') {
                header('location:/test/index.php');
            }
            if ($ROLE == 'AD') {
                header('location:/test/admin.php');
            }
        }
    } else {
        if (!array_key_exists('user', $_GET)) {
            header('location:oops.html');
        }
        $USER = $_GET['user'];
    }

    include 'services/connectDB.php';
    if (isset($conn)) {
        $sql = "SELECT * FROM personal_info WHERE userID=?";

        $statement = $conn->prepare($sql); 
        $statement->execute([$USER]);
        $info = $statement->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT date, eventName, location, flag FROM event_attendant LEFT JOIN event USING (eventID) WHERE aID=?";
        $statement = $conn->prepare($sql); 
        $statement->execute([$USER]);
        $events = $statement->fetchAll(PDO::FETCH_OBJ);
        if ($info === FALSE) {
            header('location:oops.html');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <?php ?>
    <div class="container content padding-top">
        <div class="row">
            <div class="col-12"><h1>Profile</h1><div>
        </div>
        <div class="row">
            <div class="col-md-4 col-12">
                <figure>
                    <img src="assets/users/<?php if ($info->image) echo $info->image; else echo "assets/user/nopic.png"; ?>" style="border-radius: 25px; padding: 10px;" width="200" height="250">
                    <figcaption>
                        <form action="services/updateProfile.php" method="post" enctype="multipart/form-data">
                            <label class="btn btn-outline-primary" for="image">อัพโหลดรูป Profile<input type="file" name="image" id="image" accept="image/*" hidden onchange="form.submit();"></label>
                        </form>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-8 col-12">
                <div class="row padding-top">
                    <div class="col-12"><h3>Name: <?php echo $info->firstName." ".$info->lastName; ?></h3></div>
                </div>
                <div class="row">
                    <div class="col-12"><h3>E-mail: <?php echo $info->email; ?></h3></div>
                </div>
                <div class="row">
                    <div class="col-12"><h3>Tel: <?php echo $info->phoneNo; ?></h3></div>
                </div>
            </div>
        </div>
        <div class="row" id="attended-event">
            <div class="col-lg-6 col-md-12" id="upcoming-events">
                <div class="row"><div class="col-12 text-centered"><h1>Upcoming Events</h1></div></div>
                <div class="row table-header row-with-centered-col">
                    <div class="col-5 text-centered">Event Name</div>
                    <div class="col-3 text-centered">Place</div>
                    <div class="col-3 text-centered">Date</div>
                </div>
                <no-event class="row table-row row-with-centered-col">
                    <div class="col-11 text-centered">No Event</div>
                </no-event>
            </div>
            <div class="col-lg-6 col-md-12" id="past-events">
                <div class="row"><div class="col-12 text-centered"><h1>Events You've Joined</h1></div></div>
                <div class="row table-header row-with-centered-col">
                    <div class="col-5 text-centered">Event Name</div>
                    <div class="col-3 text-centered">Place</div>
                    <div class="col-3 text-centered">Date</div>
                </div>
                <no-event class="row table-row row-with-centered-col">
                    <div class="col-11 text-centered">No Event</div>
                </no-event>
            </div>
        </div>
    <div>
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        var events = <?php if ($events !== FALSE) echo json_encode($events); else echo "[]"; ?>;
        var past = [];
        var soon = [];
        var now = Date.now();
        function parseSQLdate(sqlDate) {
            sqlDate = sqlDate.replace(/:| /g,"-");
            var YMDhms = sqlDate.split("-");
            var jsDate = new Date();
            jsDate.setFullYear(parseInt(YMDhms[0]), parseInt(YMDhms[1])-1, parseInt(YMDhms[2]));
            jsDate.setHours(parseInt(YMDhms[3]), parseInt(YMDhms[4]), parseInt(YMDhms[5]), 0);
            return jsDate
        }
        for (event of events) {
            let date = parseSQLdate(event.date);
            console.log(event);
            if (date < now) {
                past.push(event);
                $("#past-events").append(`<div class="row table-row row-with-centered-col">
                <div class="col-5 text-centered">`+event.eventName+`</div>
                <div class="col-3 text-centered">`+event.location+`</div>
                <div class="col-3 text-centered">`+date+`</div>
                </div>`);
            }
            else {
                soon.push(event);
                $("#upcoming-events").append(`<div class="row table-row row-with-centered-col">
                <div class="col-5 text-centered">`+event.eventName+`</div>
                <div class="col-3 text-centered">`+event.location+`</div>
                <div class="col-11 text-centered">`+date+`</div>
                </div>`);
            }
        }
        if (past.length > 0) {
            $('#past-events > no-event').hide();
        } else {
            $('#past-events > no-event').show();
        }
        if (soon.length > 0) {
            $('#upcoming-events > no-event').hide();
        } else {
            $('#upcoming-events > no-event').show();
        }
    </script>
</body>
</html>

