<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Loading CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="organizer.css">

    <title>Organizer | Adding Event</title>
</head>
<body>

<?php // header
require_once 'header.php' ?>

<!-- Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="headings my-4 p-4">Adding Event</h1>
    <!-- Wrapper -->
    <div class="event-location-wrapper p-4">
        <!-- form -->
        <form class="col-10 offset-1 needs-validation" method="get"
              action="eventAppender.php" novalidate>
            <!-- Event Name -->
            <div class="form-group row">
                <label for="event-name" class="col-sm-3 col-form-label">Event Name:</label>
                <input type="text" class="col-sm-8 form-control" id="event-name"
                       name="event-name"
                       placeholder="Name" required>
                <div class="invalid-feedback offset-sm-3">
                    Please fill an event name.
                </div>
            </div>
            <!-- Type of Event -->
            <div class="form-group row align-items-center">
                <label class="col-sm-3 col-form-label" for="event-selector">Type of
                    Event:</label>
                <select class="col-sm-3 custom-select" id="event-selector"
                        name="event-selector" required>
                    <option value="">Choose...</option>
                    <option value="c">Conference</option>
                    <option value="e">Entertainment</option>
                    <option value="s">Seminar</option>
                    <option value="t">Trade Fair</option>
                </select>
                <div class="invalid-feedback offset-sm-3">
                    Please select a type of the event.
                </div>
            </div>
            <!-- Event Thumbnail -->
            <div class="form-group row">
                <label for="event-thumbnail" class="col-sm-3 col-form-label">Event
                    Thumbnail:</label>
                <input type="file" class="col-sm-6" id="event-thumbnail"
                       name="event-thumbnail" accept="image/*">
            </div>
            <!-- Event Description -->
            <div class="form-group row">
                <label for="event-description" class="col-sm-3 col-form-label">Event
                    Description:</label>
                <textarea class="col-sm-9 form-control" id="event-description"
                          name="event-description"
                          rows="4" required></textarea>
                <div class="invalid-feedback offset-sm-3">
                    Please describe a description about the event.
                </div>
            </div>
            <!-- Entries -->
            <div class="form-group row">
                <label for="max-entries" class="col-sm-3 col-form-label">Maximum
                    Entries:</label>
                <input type="number" class="col-sm-3 form-control" id="max-entries"
                       name="max-entries"
                       placeholder="Entries" min="1" max="999" required>
                <div class="invalid-feedback offset-sm-3">
                    Please specify a proper maximum entries. (1-999)
                </div>
            </div>
            <!-- Event Preconditions -->
            <div class="form-group row align-items-center">
                <label for="preconditions"
                       class="col-sm-3 col-form-label">Preconditions:</label>
                <!-- Wrapper -->
                <div class="col-sm-9 row">
                    <!-- Age -->
                    <div class="col-sm-4 input-group p-0">
                        <div class="custom-control custom-checkbox m-2">
                            <input type="checkbox" class="custom-control-input"
                                   id="age-checkbox">
                            <label class="custom-control-label"
                                   for="age-checkbox">Age</label>
                        </div>
                        <input type="number" class="form-control" id="age"
                               name="age"
                               placeholder="Age" min="12" max="130" required>
                        <div class="invalid-feedback">
                            Please specify a proper minimum age. (12-130)
                        </div>
                    </div>
                    <!-- Gender -->
                    <div class="col-sm-7 offset-sm-1 input-group p-0">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="all-gender">Gender:</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"
                                   id="all-gender" value="a" checked>
                            <label class="form-check-label" for="all-gender">All Gender</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"
                                   id="male" value="m">
                            <label class="form-check-label" for="male">Male Only</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"
                                   id="female" value="f">
                            <label class="form-check-label" for="female">Female
                                Only</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Attending Cost -->
            <div class="form-group row align-items-center">
                <label for="attending-cost" class="col-sm-3 col-form-label">Attending
                    Cost:</label>
                <div class="col-sm-3 input-group p-0">
                    <div class="custom-control custom-checkbox m-2">
                        <input type="checkbox" class="custom-control-input"
                               id="attending-cost-free-checkbox">
                        <label class="custom-control-label"
                               for="attending-cost-free-checkbox">Free</label>
                    </div>
                    <input type="number" class="form-control"
                           id="attending-cost"
                           name="attending-cost"
                           min="1" placeholder="Price" required>
                    <div class="input-group-append">
                        <div class="input-group-text">฿</div>
                    </div>
                    <div class="invalid-feedback">
                        Please specify a cost to attend the event.
                    </div>
                </div>

            </div>
            <!-- Location -->
            <div class="form-group row">
                <!-- Auto Complete -->
                <label for="autocomplete-address"
                       class="col-sm-3 col-form-label">Location:</label>
                <div id="location-field" class="col-sm-9 px-0">
                    <input id="autocomplete-address"
                           class="form-control mb-4"
                           placeholder="Enter your address..."
                           onFocus="geolocate()" type="text">
                    <div class="row container">
                        <!-- Location Name -->
                        <div class="form-group row col-12 mb-4">
                            <label for="location-name"
                                   class="col-lg-2 col-form-label">Location Name:</label>
                            <input type="text" class="col-lg-10 form-control"
                                   id="premise" name="location-name"
                                   placeholder="Location Name" required>
                            <div class="invalid-feedback offset-lg-2">
                                Please fill a location name.
                            </div>
                        </div>
                        <!-- House No/ Village, Road -->
                        <div class="form-group row col-12 mb-4">
                            <!-- House No/ Village -->
                            <label for="street_number" class="col-lg-2 col-form-label">House
                                Number:</label>
                            <input type="text" class="col-lg-2 form-control"
                                   id="street_number" name="street_number"
                                   placeholder="House No.">
                            <!-- Road -->
                            <label for="route" class="col-lg-2 col-form-label">Road
                                Address:</label>
                            <input type="text" class="col-lg-6 form-control" id="route"
                                   name="route"
                                   placeholder="Road Address" required>
                            <div class="invalid-feedback col-lg-6 offset-lg-6">
                                Please fill a road address name.
                            </div>
                        </div>
                        <!-- Subdistrict, District -->
                        <div class="form-group row col-12 mb-4">
                            <!-- Subdistrict -->
                            <label for="sublocality_level_2"
                                   class="col-lg-2 col-form-label">Subdistrict:</label>
                            <input type="text" class="col-lg-4 form-control"
                                   id="sublocality_level_2" name="sub-district"
                                   placeholder="Subdistrict" required>
                            <div class="invalid-feedback offset-lg-2">
                                Please fill a subdiestrict name.
                            </div>
                            <!-- District -->
                            <label for="sublocality_level_1"
                                   class="col-lg-2 col-form-label">District:</label>
                            <input type="text" class="col-lg-4 form-control"
                                   id="sublocality_level_1" name="district"
                                   placeholder="District" required>
                            <div class="invalid-feedback offset-lg-2">
                                Please fill a district name.
                            </div>
                        </div>
                        <!-- City -->
                        <div class="form-group row col-12 mb-4">
                            <label for="administrative_area_level_1"
                                   class="col-lg-2 col-form-label">City:</label>
                            <input type="text" class="col-lg-10 form-control"
                                   id="administrative_area_level_1"
                                   name="city"
                                   placeholder="City" required>
                            <div class="invalid-feedback offset-lg-2">
                                Please fill a city name.
                            </div>
                        </div>
                        <!-- Postal code, Country -->
                        <div class="form-group row col-12 mb-4">
                            <!-- Postal code -->
                            <label for="postal_code" class="col-lg-2 col-form-label">Postal
                                Code:</label>
                            <div class="col-lg-4 input-group p-0">
                                <input type="number" class="col-lg-6 form-control"
                                       id="postal_code" name="postal_code"
                                       placeholder="Postal Code" required>
                                <div class="invalid-feedback col-lg-6">
                                    Please fill a postal code.
                                </div>
                            </div>
                            <!-- Postal code -->
                            <label for="country"
                                   class="col-lg-2 col-form-label">Country:</label>
                            <div class="col-lg-4 input-group p-0">
                                <input type="text" class="col-lg-6 form-control"
                                       id="country"
                                       name="country"
                                       placeholder="Country" required>
                                <div class="invalid-feedback col-lg-6 offset-lg-2">
                                    Please fill a country name.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Submit -->
            <div class="form-group row col-sm-8 offset-sm-2">
                <div class="col-centered">
                    <button type="submit" class="btn btn-primary m-1" id="add-event">Add
                        Event
                    </button>
                    <button type="button" class="btn btn-primary m-1" id="discard-event">
                        Discard
                    </button>
                </div>
            </div>
            <!-- /.form -->
        </form>
        <!-- /.wrapper -->
    </div>
    <!-- /.container -->
</div>

<!-- Loading Scripts -->
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<!-- Header Script -->
<script src="headerjs.js"></script>
<!-- Event Validator-->
<script src="event-validator.js"></script>
<!-- Auto Address Script -->
<script src="auto-address.js"></script>
<!-- Google Maps JS API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFDllUC_ofU2tABnCon3X-WUfPtjS4H_o
&libraries=places&callback=initAutocomplete"
        async defer></script>
<!-- Event Checkbox -->
<script src="event-checkbox.js"></script>
</body>
</html>
