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
        session_start();
        //เช็คว่ามี error ไหม
        if (array_key_exists("e", $_GET)) {
            if ($_GET['e']==1) {
                echo "<p>Incorrect Username and/or Password</p>";
            } else if ($_GET['e']==2) {
                echo "<p>Please login first.</p>";
            }
        }
    ?>
    <form action="doLogin.php" method="post">
        <label for="username">Username: <input type="text" name="username" id="username"></label>
        <label for="password">Password: <input type="password" name="password" id="password"></label>
        <input type="submit" value="submit">
    </form>
</body>
</html>