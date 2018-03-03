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
        if (!$LOGGEDIN) {
            echo "<h1>You are not logged in!</h1>";
            session_start();
            $_SESSION['PREV'] = 'nextpage.php';
            session_write_close();
            header("location:login.php?e=2");
        } else {
            if ($_SESSION['ROLE'] != 'attendant') {
                header("location:index.php");
            }
        }
        
    ?>
</body>
</html>