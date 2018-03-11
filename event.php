<?php 
include 'header.php';
?>
<link rel="stylesheet" href="css/event.css">
<body>
    <div class="container">
        <div class="col-12 padding-top" id="event">
            <div class="event-cover">
                <img class="img-responsive top-radius" style="width: 100%" src="https://p-u.popcdn.net/events/covers/000/002/953/cover/Event_Cover_EventPop.png?1518085329"
                    alt="Event cover eventpop">
            </div>
            <div class="content-box no-border-bottom">
                <h1 id="event-title">
                    WisePass Bangkok Official Launch
                </h1>
                <div class="row">
                    <div id="event-info" class="col-xs-12 col-sm-8">
                        <div id="event-time">
                            <i class="fa fa-clock-o fa-fw text-primary"></i> 15 March 2018 at 19:00 - 22:00
                        </div>

                        <div id="event-location">
                            <a data-toggle="collapse" href="#event-map">
                                <i class="fa fa-map-marker fa-fw text-primary"></i>
                                Le Fenix Sukhumvit, Soi Sukhumvit 11, Khlong Toei Nuea, Watthana, Bangkok, Thailand
                                <i class="fa fa-caret-down text-primary"></i>
                            </a>
                        </div>
                        <!-- event-location -->
                    </div>
                    <!-- event-info -->

                    <div class="col-xs-12 col-sm-4 text-right text-xs-center action-button">
                        <a class="btn btn-secondary" id="top-buy-tickets-btn" data-scroll="true" href="#event-tickets">Get Tickets</a>
                    </div>
                </div>
                <div id="event-map" class="collapse">
                    wow
                    <div id="gmap"></div>
                </div>
            </div>
        </div>

    </div>
    <script>
      function initMap() {
        // Create a map object and specify the DOM element for display.
        console.log(document.getElementById('gmap'))
        var map = new google.maps.Map(document.getElementById('gmap'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
        console.log(map)
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8OKwMaEJnFUsBBoHsvaHF_cvYoXbJydM&callback=initMap" async defer></script>
</body>