<?php
    include 'checkLogin.php';
    $ISOWNER = FALSE;
    if ($LOGGEDIN) {
        $ROLE = $_SESSION['ROLE'];
        $USER = $_SESSION['ID'];
        if (array_key_exists('user', $_GET)) {
            $USER = $_GET['user'];
        }
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
            header('location:/test_profile/oops.html');
        }
        $USER = $_GET['user'];
    }

    include 'connectDB.php';
    if (isset($conn)) {
        $sql = "SELECT * FROM personal_info WHERE userID=?";

        $statement = $conn->prepare($sql); 
        $statement->execute([$USER]);
        $info = $statement->fetch(PDO::FETCH_OBJ);

        

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
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="banner">
        
    </div>
    <div class="container content padding-top">
        <div class="row">
            <div class="col-12"><h1>Profile</h1><div>
        </div>
        <div class="row">
            <div class="col-md-4 col-12">
                <figure>
                    <img src="<?php if ($info->image) echo $info->image; else echo "image/nopic.png"; ?>" style="border-radius: 25px; padding: 10px;" width="200" height="250">
                    <figcaption>
                        <form action="updateProfile.php" method="post" enctype="multipart/form-data">
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
    <div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>

