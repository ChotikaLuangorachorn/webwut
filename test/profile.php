<?php
    include 'checkLogin.php';
    $ISOWNER = FALSE;
    if ($LOGGEDIN) {
        $ROLE = $_SESSION['ROLE'];
        $USER = $_SESSION['UID'];
        if (array_key_exists('user', $_GET)) {
            $USER = $_GET['user'];
        }
        if ($USER == $_SESSION['UID']) {
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
        $result = $statement->fetch(PDO::FETCH_OBJ);
        if ($result === FALSE) {
            header('location:oops.html');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div><h1>Profile</h1></div>
        <div>
            <figure>
                <!-- <img src="<?php echo $result->image ?>" style="border-radius: 25px;" width="150" height="200"> -->
            </figure>
            <p>name: <?php echo $result->firstName." ".$result->lastName ?></p>
            <p>e-mail: <?php echo $result->email ?></p>
            <p>tel: <?php echo $result->phoneNo ?></p>
        </div>
    <div>
</body>
</html>

