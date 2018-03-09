<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
    <div class="text-center">
        <div class="logo">Create a new account</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="register-form" class="text-left">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="reg_username" class="sr-only">Email address</label>
                            <input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="reg_password" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
                            <input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password">
                        </div>
                        <div class="form-group">
                            <label for="reg_fullname" class="sr-only">Full Name</label>
                            <input type="text" class="form-control" id="reg_fullname" name="reg_fullname" placeholder="first name">
                        </div>
                        <div class="form-group">
                            <label for="reg_fullname" class="sr-only">Surname</label>
                            <input type="text" class="form-control" id="reg_lastname" name="reg_lastname" placeholder="surname">
                        </div>
                        <div class="form-group">
                            <label for="reg_fullname" class="sr-only">Age</label>
                            <input type="text" class="form-control" id="reg_age" name="reg_age" placeholder="age">
                        </div>
                        <div class="form-group">
                            <label for="reg_email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="reg_fullname" class="sr-only">Mobile No</label>
                            <input type="text" class="form-control" id="reg_mobile_no" name="reg_mobile_no" placeholder="mobile number">
                        </div>                          
                        <div class="form-group login-group-checkbox">
                            <input type="radio" class="" name="reg_gender" id="male" placeholder="username">
                            <label for="male">male</label>
                                
                            <input type="radio" class="" name="reg_gender" id="female" placeholder="username">
                            <label for="female">female</label>
                        </div>
                        <div class="form-group login-group-checkbox">
                            <input type="radio" class="" name="reg_role" id="organizer" placeholder="role">
                            <label for="organizer">organizer</label>
                                
                            <input type="radio" class="" name="reg_role" id="attendant" placeholder="role">
                            <label for="attendant">attendant</label>
                        </div>
                            
                    </div>
                    <a href="../index.php" class="btn login-button"><i class="fa fa-chevron-right"></i></a>
                    <!-- <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button> -->
                </div>
                <div class="etc-login-form">
                    <p>already have an account? <a href="../login.php">login here</a></p>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

</body>
</html>