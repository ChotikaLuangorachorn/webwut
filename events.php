<?php
  $category = $_REQUEST['data'];
  if ($category == "Science" ||
      $category == "Business" ||
      $category == "Education" ||
      $category == "Hobbies" ||
      $category == "Music" ||
      $category == "Health" ||
      $category == "Community" ||
      $category == "Sports"){
  }
  else {
    header('HTTP/1.0 404 Not Found');
    echo "<h1>Error 404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
   exit();
  }


  include 'services/connectDB.php';
    if (isset($conn)) {
      $sql = "SELECT * FROM event WHERE type='$category'";
      $stmt = $conn->prepare($sql);
      try {
        $stmt->execute();
      } catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
      $allEvents = $stmt->fetchAll(PDO::FETCH_OBJ);
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Webwut Event</title>
</head>

<body>
  <?php include 'header.php';?>

<div class="container">

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
                  <a class="dropdown-item" href="events.php?data=Science">Science & Technology</a>
                  <a class="dropdown-item" href="events.php?data=Business">Business</a>
                  <a class="dropdown-item" href="events.php?data=Education">Education</a>
                  <a class="dropdown-item" href="events.php?data=Hobbies">Hobbies</a>
                  <a class="dropdown-item" href="events.php?data=Music">Music</a>
                  <a class="dropdown-item" href="events.php?data=Health">Health</a>
                  <a class="dropdown-item" href="events.php?data=Community">Community</a>
                  <a class="dropdown-item" href="events.php?data=Sports">Sports</a>
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

  <div class="container-fluid noPadding">
    <br><br>
    <div class="row">

      <div class="container-fluid">
        <div class="allEvents" id="allEvents"></div>
      </div>
    </div>
    <br>

</div>





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <script>

    function formatDate(sqlDate) {
      sqlDate = sqlDate.split(" ");
      date = sqlDate[0];
      dateSplit = date.split("-");
      year = dateSplit[0];
      month = dateSplit[1];
      if (month == 01){month = "January";}
      else if (month == 02){month = "February";}
      else if (month == 03){month = "March";}
      else if (month == 04){month = "April";}
      else if (month == 05){month = "May";}
      else if (month == 06){month = "June";}
      else if (month == 07){month = "July";}
      else if (month == 08){month = "August";}
      else if (month == 09){month = "September";}
      else if (month == 10){month = "October";}
      else if (month == 11){month = "November";}
      else if (month == 12){month = "December";}
      day = dateSplit[2];

      time = sqlDate[1];
      timeSplit = time.split(":");
      hr = timeSplit[0];
      min = timeSplit[1];
      sec = timeSplit[2];

      return day + " " + month + " " + year + " | " + hr + ":" + min;
    }

      var count = 0;
      var allEvents = <?php echo json_encode($allEvents); ?>;
      var html = '';

      for (index in allEvents) {
      html += `
        `+(index%3==0 ? '<div class="row">' : '')+`
        <div class="col-sm-4">
          <div class="row table-row">
            <div class="col-7">
              <img src="#event pic promote" width="100" height="100" class="d-inline-block align-top" id="titleImage" alt="">
            </div>
            <div class="col-5 align-self-center">
              <a href="#selected event" class="btn btn-join" role="button">สมัคร</a>
            </div>
            <div class="col-12">
              <br>
              <p class="topic">`+allEvents[index].eventName+`</p>
              <div><i class="material-icons">access_time</i>&nbsp;`+formatDate(allEvents[index].date)+`</div>
              <div><i class="material-icons">place</i>&nbsp;`+allEvents[index].location+`</div>
            </div>
          </div>
          </div>
          `+(index%3==2 || index+1==allEvents.length ? '</div>' : '')+`
      `;
    }
    $(".allEvents").append(html);


  </script>

</body>
</html>
