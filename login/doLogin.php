<?php
    //เรียกใช้ session
    session_start();


    if (array_key_exists("lg_username", $_POST) && array_key_exists("lg_password", $_POST)) {
        $uid = $_POST['lg_username'];
        $pass = crypt($_POST['lg_password'], '$webwut$');

        include 'connectDB.php';
        $sql = "SELECT * FROM user WHERE userID=? AND PASSWORD=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$uid, $pass]);
        $user = $statement->fetch(PDO::FETCH_OBJ);

        if ($user !== FALSE) {
            // echo "enter IF";
            //set ตัวแปรใน session ไว้ว่าใคร log in อยู่ และเป็น role อะไร
            $_SESSION["ID"] = $user->id;
            $_SESSION["ROLE"] = $user->role;
            session_write_close();
            //เช็คว่ากด login มาจากหน้าไหนให้กลับไปหน้านั้น
            //ถ้าไม่ได้บอกไว้ให้ไปหน้าแรกของแต่ละ Role
            if (array_key_exists("PREV", $_SESSION)) {
                header("location:".$_SESSION["PREV"]);
                echo 'PREV';
            } else {
                if ($user->role == 'AT') {
                    header("location:..");
                    echo 'Hi Attendant !';
                }
                if ($user->role == 'OR') {
                    // header("location:index.php");
                    echo 'Hello Organizer !!';
                }
                if ($user->role == 'AD') {
                    header("location:../administrator/index.php");
                    echo 'Welcome Admin';
                }
            }
        } else {
            //login ไม่สำเร็จ show error
            header("location:login.php?e=1");
            session_write_close();
        }
    }
?>