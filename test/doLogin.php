<?php
    session_start();
    $users = array(
        (object)array('uid'=>'user','pass'=>'user','role'=>'attendant'),
        (object)array('uid'=>'admin','pass'=>'admin','role'=>'organizer'),
        (object)array('uid'=>'root','pass'=>'root','role'=>'administrator')
    );

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
            echo "Login Success";
            $_SESSION["UID"] = $user->uid;
            $_SESSION["ROLE"] = $user->role;
            session_write_close();
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
            header("location:login.php?e=1");
            session_write_close();
        }
    }
?>