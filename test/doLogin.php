<?php
    //เรียกใช้ session
    session_start();
    //ตัวอย่าง users
    //ในงานจริงมันจะต้องอยู่ใน db
    $users = array(
        (object)array('uid'=>'user','pass'=>'user','role'=>'attendant'),
        (object)array('uid'=>'admin','pass'=>'admin','role'=>'organizer'),
        (object)array('uid'=>'root','pass'=>'root','role'=>'administrator')
    );
    //function เช็คว่า user password ตรงกับที่มีอยู่ไหม
    //ถ้าตรง คืนค่า ชื่อ username
    //ไม่ตรง คืนค่า false
    function login($uid, $pass, $users) {
        foreach ($users as $user) {
            if ($user->uid==$uid && $user->pass==$pass) return $user;
        }
        return FALSE;
    }

    if (array_key_exists("username", $_POST) && array_key_exists("password", $_POST)) {
        $uid = $_POST['username'];
        $pass = $_POST['password'];
        if ($user = login($uid, $pass, $users)) {
            //login สำเร็จ
            echo "Login Success";
            //set ตัวแปรใน session ไว้ว่าใคร log in อยู่ และเป็น role อะไร
            $_SESSION["UID"] = $user->uid;
            $_SESSION["ROLE"] = $user->role;
            session_write_close();
            //เช็คว่ากด login มาจากหน้าไหนให้กลับไปหน้านั้น
            //ถ้าไม่ได้บอกไว้ให้ไปหน้าแรกของแต่ละ Role
            if (array_key_exists("PREV", $_SESSION)) {
                header("location:".$_SESSION["PREV"]);
            } else {
                if ($user->role == 'attendant') {
                    header("location:index.php");
                }
                if ($user->role == 'organizer') {
                    header("location:index.php");
                }
                if ($user->role == 'administrator') {
                    header("location:admin.php");
                }
            }
        } else {
            //login ไม่สำเร็จ show error
            header("location:login.php?e=1");
            session_write_close();
        }
    }
?>