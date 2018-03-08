<?php
    include 'checkLogin.php';
    if (!$LOGGEDIN) {
        //ถ้ายังไม่ log in ให้ย้ายไปหน้า log in ก่อน
        echo "<h1>You are not logged in!</h1>";
        //set ตัวแปร PREV ไว้ เพื่อให้หลังจาก login แล้วกลับมาที่หน้าเดิมได้
        $_SESSION['PREV'] = 'nextpage.php';
        session_write_close();
        //ไปหน้า log in พร้อมแสดง error
        header("location:login.php?e=2");
    } else {
        //ถ้า log in แล้วแต่ไม่ใช้ attendant ให้กลับไปหน้าแรกของ role
        if ($_SESSION['ROLE'] != 'AT') {
            header("location:index.php");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="profile.php">Profile</a>
</body>
</html>