<?php
    include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="adminStyle.css">
    
</head>
<body>
    <div class="tab">
        <button id="btn-show-organizer">Organizer</button>
        <button id="btn-show-attendant">Attendant</button>
        <button id="btn-show-administrator">Administrator</button>
        <button id="btn-show-event">Event</button>
    </div>
    <div class="container" role="main">
        <!-- Organizer -->
        <div class="row">
            
        </div>
        <div class="row" id="show-organizer">
            <div class="col-12" style="text-align: center;">
                <span style="font-size: 1.5em;">Organizer List</span><br>
                Seach: <input oninput="w3.filterHTML('.organizer-list', '#list', this.value)" placeholder="search for a word" style="margin-bottom: 10px;">
            </div>
            <div class="col-12">
                <table>
                    <thead>
                        <tr">
                            <th onclick="w3.sortHTML('.organizer-list', '#list', 'td:nth-child(1)')" scope="col" style="width: 50px;">ID</th>
                            <th onclick="w3.sortHTML('.organizer-list', '#list', 'td:nth-child(2)')" scope="col" style="width: 200px;">UserID</th>
                            <th onclick="w3.sortHTML('.organizer-list', '#list', 'td:nth-child(3)')" scope="col" style="width: 200px;">Organizer Name</th>
                            <th onclick="w3.sortHTML('.organizer-list', '#list', 'td:nth-child(4)')" scope="col" style="width: 200px;">E-mail</th>
                            <th onclick="w3.sortHTML('.organizer-list', '#list', 'td:nth-child(5)')" scope="col" style="width: 100px;">Phone</th>
                        </tr>
                    </thead>
                    <tbody class="organizer-list">
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Attendant -->
        <div class="row" id="show-attendant">
            <div class="col-12" style="text-align: center;">
                <span style="font-size: 1.5em;">Attendant List</span><br>
                Seach: <input oninput="w3.filterHTML('.attendant-list', '#list', this.value)" placeholder="search for a word" style="margin-bottom: 10px;">
            </div>
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">ID</th>
                            <th scope="col" style="width: 200px;">UserID</th>
                            <th scope="col" style="width: 200px;">Organizer Name</th>
                            <th scope="col" style="width: 200px;">E-mail</th>
                            <th scope="col" style="width: 100px;">Phone</th>
                        </tr>
                    </thead>
                    <tbody class="attendant-list"></tbody>
                </table>
            </div>
        </div>

        <!-- Administrator -->
        <div class="row" id="show-administrator">
            <div class="col-12" style="text-align: center;">
                <span style="font-size: 1.5em;">Administrator List</span><br>
                Seach: <input oninput="w3.filterHTML('.administrator-list', '#list', this.value)" placeholder="search for a word" style="margin-bottom: 10px;">
            </div>
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">ID</th>
                            <th scope="col" style="width: 200px;">UserID</th>
                            <th scope="col" style="width: 200px;">Organizer Name</th>
                            <th scope="col" style="width: 200px;">E-mail</th>
                            <th scope="col" style="width: 100px;">Phone</th>
                        </tr>
                    </thead>
                    <tbody class="administrator-list"></tbody>
                </table>
            </div>
        </div>

        <!-- Event -->
        <div class="row" id="show-event">
            <div class="col-12" style="text-align: center;">
                <span style="font-size: 1.5em;">Event List</span><br>
                Seach: <input oninput="w3.filterHTML('.event-list', '#list', this.value)" placeholder="search for a word" style="margin-bottom: 10px;">
            </div>
            
            <div class="col-12">

                <table>
                    <thead>
                        <tr>
                            <th onclick="w3.sortHTML('.event-list', '#list', 'td:nth-child(1)')" scope="col" style="width: 100px;">ID</th>
                            <th onclick="w3.sortHTML('.event-list', '#list', 'td:nth-child(2)')" scope="col" style="width: 200px;">Date</th>
                            <th onclick="w3.sortHTML('.event-list', '#list', 'td:nth-child(3)')" scope="col" style="width: 200px;">Name</th>
                            <th onclick="w3.sortHTML('.event-list', '#list', 'td:nth-child(4)')" scope="col" style="width: 350px;">Location</th>
                            <th onclick="w3.sortHTML('.event-list', '#list', 'td:nth-child(5)')" scope="col" style="width: 100px;">Capacity</th>
                            <th onclick="w3.sortHTML('.event-list', '#list', 'td:nth-child(6)')" scope="col" style="width: 100px;">Price</th>
                            <th onclick="w3.sortHTML('.event-list', '#list', 'td:nth-child(7)')" scope="col" style="width: 200px;">Type</th>
                            <th onclick="w3.sortHTML('.event-list', '#list', 'td:nth-child(8)')" scope="col" style="width: 250px;">Organizer Name</th>
                        </tr>
                    </thead>
                    <tbody class="event-list"></tbody>
                </table>
            </div>
        </div>


    </div>


    <!-- Loading Scripts -->
    <!-- Bootstrap core JavaScript -->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>

    <!-- for search -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="adminScripts.js"></script>
</body>
</html>