<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
    <?php
        session_start();

        if (array_key_exists("e", $_GET)) {
            if ($_GET['e']==1) {
                echo "<p>Incorrect Username and/or Password</p>";
            } else if ($_GET['e']==2) {
                echo "<p>Please login first.</p>";
            }
        }
    ?>
    <div class="text-center">
        <div class="logo">Sign In</div>
        <!-- Main Form -->
            <div class="login-form-1">
                <form id="login-form" class="text-left" action="doLogin.php" method="post">
                    <div class="login-form-main-message"></div>
                    <div class="main-login-form">
                        <div class="login-group">
                            <div class="form-group">
                                <label for="lg_username" class="sr-only">Username</label>
                                <input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="username">
                            </div>
                            <div class="form-group">
                                <label for="lg_password" class="sr-only">Password</label>
                                <input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password">
                            </div>
                            <div>
                                <label class="btn login-button" for="submit_button"><i class="fa fa-chevron-right"><input type="submit" name="submit_button" id="submit_button" hidden></i></label>
                            </div>
                            <div class="etc-login-form">
                                <p><a href="./registration.php">create new attendant</a></p>
                                <p><a href="./regis_organizer.php">create new organizer</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end:Main Form -->
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"
            integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i"
            crossorigin="anonymous">
    </script>
    <script src="index.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</body>
</html>