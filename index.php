<?php
  include 'services/connectDB.php';
    if (isset($conn)) {
      // random CAROUSEL SLIDE


      // Science & Technology
      $sql = "SELECT * FROM event WHERE type='Science'";
      $stmt = $conn->prepare($sql);
      try {
        $stmt->execute();
      } catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
      $scienceEvents = $stmt->fetchAll(PDO::FETCH_OBJ);

      // Business
      $sql = "SELECT * FROM event WHERE type='Business' ORDER BY RAND() LIMIT 2";
      $stmt = $conn->prepare($sql);
      try {
        $stmt->execute();
      } catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
      $businessEvents = $stmt->fetchAll(PDO::FETCH_OBJ);

      // Education
      $sql = "SELECT * FROM event WHERE type='Education' ORDER BY RAND() LIMIT 2";
      $stmt = $conn->prepare($sql);
      try {
        $stmt->execute();
      } catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
      $educationEvents = $stmt->fetchAll(PDO::FETCH_OBJ);

      // Hobbies
      $sql = "SELECT * FROM event WHERE type='Hobbies' ORDER BY RAND() LIMIT 2";
      $stmt = $conn->prepare($sql);
      try {
        $stmt->execute();
      } catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
      $hobbiesEvents = $stmt->fetchAll(PDO::FETCH_OBJ);

      // Music
      $sql = "SELECT * FROM event WHERE type='Music' ORDER BY RAND() LIMIT 2";
      $stmt = $conn->prepare($sql);
      try {
        $stmt->execute();
      } catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
      $musicEvents = $stmt->fetchAll(PDO::FETCH_OBJ);

      // Health
      $sql = "SELECT * FROM event WHERE type='Health' ORDER BY RAND() LIMIT 2";
      $stmt = $conn->prepare($sql);
      try {
        $stmt->execute();
      } catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
      $healthEvents = $stmt->fetchAll(PDO::FETCH_OBJ);

      // Community
      $sql = "SELECT * FROM event WHERE type='Community' ORDER BY RAND() LIMIT 2";
      $stmt = $conn->prepare($sql);
      try {
        $stmt->execute();
      } catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
      $communityEvents = $stmt->fetchAll(PDO::FETCH_OBJ);

      // Sports
      $sql = "SELECT * FROM event WHERE type='Sports' ORDER BY RAND() LIMIT 2";
      $stmt = $conn->prepare($sql);
      try {
        $stmt->execute();
      } catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
      $sportsEvents = $stmt->fetchAll(PDO::FETCH_OBJ);
      // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      //   echo $row['eventName']."<br>";
      //   echo $row['date']."<br>";
      //   echo $row['location']."<br>";
      // }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">

    <title>Webwut Event</title>
</head>

<body>

  <?php include 'test/header.php';?>

  <div class="container">
<!-- CAROUSEL SLIDE -->
      <br>
      <div id="demo" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
          </ul>
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <!-- image example ,, random from table ?-->
        <a href="#"><img src="https://p-u.popcdn.net/hero_images/desktop_images/000/000/116/medium/40fca800ed77afd6cdff29e2c9ca9940d02f8e0e.png?1519540399" alt="1">
      </a></div>
      <div class="carousel-item">
        <a href="#"><img src="https://p-u.popcdn.net/hero_images/desktop_images/000/000/116/medium/40fca800ed77afd6cdff29e2c9ca9940d02f8e0e.png?1519540399" alt="2">
      </a></div>
      <div class="carousel-item">
        <a href="#"><img src="https://p-u.popcdn.net/hero_images/desktop_images/000/000/116/medium/40fca800ed77afd6cdff29e2c9ca9940d02f8e0e.png?1519540399" alt="3">
      </a></div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
    </div>



<!-- menu Button -->
  <div class="container-fluid">
    <div class="row" id="menuBar">
      <div class="col-sm-6 noPadding">
        <div class="btn-group">
          <button class="btn btn-default-dropdown btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <b>Explore events</b>
          </button>
          <div class="dropdown-menu">
              <a class="dropdown-item" href="#">All</a>
                <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" onClick="setVariable('science');">Science & Technology</a>
                  <a class="dropdown-item" href="#" onClick="setVariable('business');">Business</a>
                  <a class="dropdown-item" href="#" onClick="setVariable('education');">Educaion</a>
                  <a class="dropdown-item" href="#" onClick="setVariable('hobbies');">Hobbies</a>
                  <a class="dropdown-item" href="#" onClick="setVariable('music');">Music</a>
                  <a class="dropdown-item" href="#" onClick="setVariable('health');">Health</a>
                  <a class="dropdown-item" href="#" onClick="setVariable('community');">Community</a>
                  <a class="dropdown-item" href="#" onClick="setVariable('sports');">Sports</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 noPadding">
        order by :
        <div class="btn-group">
          <button class="btn btn-default-dropdown btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <b>time</b>
          </button>
          <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">time</a>
                  <a class="dropdown-item" href="#">organizer</a>
                  <a class="dropdown-item" href="#">location</a>
          </div>
        </div>
      </div>
    </div>

<!-- Box -->
    <div class="container-fluid noPadding">
      <br><br>
      <!-- Science & Technology -->
      <div class="row">
        <div class="col-sm-7 noPadding">
          <div class="topicYellow"><b>Science & Technology</b></div>
          <div class="scienceEvent"></div>
        </div>
        <div class="col-sm-5"></div>
      </div>
      <br>
      <!-- Business -->
      <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-7 noPadding">
          <div class="topicPink"><b>Business</b></div>
          <div class="businessEvent"></div>
        </div>
      </div>
      <br>
      <!-- Education -->
      <div class="row">
        <div class="col-sm-7 noPadding">
          <div class="topicBlue"><b>Education</b></div>
          <div class="educationEvent"></div>
          </div>
        <div class="col-sm-5"></div>
      </div>
      <br>
      <!-- Hobbies -->
      <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-7 noPadding">
          <div class="topicYellow"><b>Hobbies</b></div>
          <div class="hobbiesEvent"></div>
        </div>
      </div>
      <br>
      <!-- Music -->
      <div class="row">
        <div class="col-sm-7 noPadding">
          <div class="topicPink"><b>Music</b></div>
          <div class="musicEvent"></div>
        </div>
        <div class="col-sm-5"></div>
      </div>
      <br>
      <!-- Health -->
      <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-7 noPadding">
            <div class="topicBlue"><b>Health</b></div>
            <div class="healthEvent"></div>
        </div>
      </div>
      <br>
      <!-- Community -->
      <div class="row">
        <div class="col-sm-7 noPadding">
          <div class="topicYellow"><b>Community</b></div>
          <div class="communityEvent"></div>
        </div>
        <div class="col-sm-5"></div>
      </div>
      <br>
      <!-- Sports -->
      <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-7 noPadding">
          <div class="topicPink"><b>Sports</b></div>
          <div class="sportsEvent"></div>
        </div>
      </div>
    </div>

  </div>
  </div>




      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

      <script type="text/javascript">
      function setVariable($day) {
          console.log($day);
      }
      </script>

      <script>


          var scienceEvents = <?php echo json_encode($scienceEvents); ?>;
          for (event of scienceEvents) {
          $(".scienceEvent").append(`<a href="#selected event">
          <div class="row table-row">
            <div class="col-3">
              <img src="#event pic promote" width="75" height="75" class="d-inline-block align-top" id="titleImage" alt="">
              <a href="#selected event" class="btn btn-join" role="button">สมัคร</a>
              </div>
            <div class="col-9">
              <p class="topic">`+event.eventName+`</p>
              <div>`+event.date+`</div>
              <div>`+event.location+`</div>
            </div>
          </div></a>`);
          }

          var businessEvents = <?php echo json_encode($businessEvents ); ?>;
          for (event of businessEvents) {
            $(".businessEvent").append(`<a href="#selected event">
            <div class="row table-row">
              <div class="col-3">
                <img src="#event pic promote" width="75" height="75" class="d-inline-block align-top" id="titleImage" alt="">
                <a href="#selected event" class="btn btn-join" role="button">สมัคร</a>
                </div>
              <div class="col-9">
                <p class="topic">`+event.eventName+`</p>
                <div>`+event.date+`</div>
                <div>`+event.location+`</div>
              </div>
            </div></a>`);
          }

          var educationEvents = <?php echo json_encode($educationEvents); ?>;
          for (event of educationEvents) {
            $(".educationEvent").append(`<a href="#selected event">
            <div class="row table-row">
              <div class="col-3">
                <img src="#event pic promote" width="75" height="75" class="d-inline-block align-top" id="titleImage" alt="">
                <a href="#selected event" class="btn btn-join" role="button">สมัคร</a>
                </div>
              <div class="col-9">
                <p class="topic">`+event.eventName+`</p>
                <div>`+event.date+`</div>
                <div>`+event.location+`</div>
              </div>
            </div></a>`);
          }

          var hobbiesEvents = <?php echo json_encode($hobbiesEvents ); ?>;
          for (event of hobbiesEvents) {
            $(".hobbiesEvent").append(`<a href="#selected event">
            <div class="row table-row">
              <div class="col-3">
                <img src="#event pic promote" width="75" height="75" class="d-inline-block align-top" id="titleImage" alt="">
                <a href="#selected event" class="btn btn-join" role="button">สมัคร</a>
                </div>
              <div class="col-9">
                <p class="topic">`+event.eventName+`</p>
                <div>`+event.date+`</div>
                <div>`+event.location+`</div>
              </div>
            </div></a>`);
          }

          var musicEvents = <?php echo json_encode($musicEvents ); ?>;
          for (event of musicEvents) {
            $(".musicEvent").append(`<a href="#selected event">
            <div class="row table-row">
              <div class="col-3">
                <img src="#event pic promote" width="75" height="75" class="d-inline-block align-top" id="titleImage" alt="">
                <a href="#selected event" class="btn btn-join" role="button">สมัคร</a>
                </div>
              <div class="col-9">
                <p class="topic">`+event.eventName+`</p>
                <div>`+event.date+`</div>
                <div>`+event.location+`</div>
              </div>
            </div></a>`);
          }

          var healthEvents = <?php echo json_encode($healthEvents ); ?>;
          for (event of healthEvents) {
            $(".healthEvent").append(`<a href="#selected event">
            <div class="row table-row">
              <div class="col-3">
                <img src="#event pic promote" width="75" height="75" class="d-inline-block align-top" id="titleImage" alt="">
                <a href="#selected event" class="btn btn-join" role="button">สมัคร</a>
                </div>
              <div class="col-9">
                <p class="topic">`+event.eventName+`</p>
                <div>`+event.date+`</div>
                <div>`+event.location+`</div>
              </div>
            </div></a>`);
          }

          var communityEvents = <?php echo json_encode($communityEvents ); ?>;
          for (event of communityEvents) {
            $(".communityEvent").append(`<a href="#selected event">
            <div class="row table-row">
              <div class="col-3">
                <img src="#event pic promote" width="75" height="75" class="d-inline-block align-top" id="titleImage" alt="">
                <a href="#selected event" class="btn btn-join" role="button">สมัคร</a>
                </div>
              <div class="col-9">
                <p class="topic">`+event.eventName+`</p>
                <div>`+event.date+`</div>
                <div>`+event.location+`</div>
              </div>
            </div></a>`);
          }

          var sportsEvents = <?php echo json_encode($sportsEvents ); ?>;
          for (event of sportsEvents) {
            $(".sportsEvent").append(`<a href="#selected event">
            <div class="row table-row">
              <div class="col-3">
                <img src="#event pic promote" width="75" height="75" class="d-inline-block align-top" id="titleImage" alt="">
                <a href="#selected event" class="btn btn-join" role="button">สมัคร</a>
                </div>
              <div class="col-9">
                <p class="topic">`+event.eventName+`</p>
                <div>`+event.date+`</div>
                <div>`+event.location+`</div>
              </div>
            </div></a>`);
          }
      </script>
  </body>
</html>
