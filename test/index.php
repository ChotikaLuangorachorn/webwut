<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        include 'checkLogin.php';
        if ($LOGGEDIN) {
            if ($_SESSION['ROLE']=='administrator') {
                header('location:admin.php');
            }
            echo "You are logged in as ".$_SESSION['UID'];
        } else {
            echo "<a href='login.php'>login</a>";
        }
    ?>
    <a href="nextpage.php">nextpage</a>
    <?php
        if ($LOGGEDIN) {
            echo "<a href='logout.php'>logout</a>";
        }
    ?>
</body>
</html>