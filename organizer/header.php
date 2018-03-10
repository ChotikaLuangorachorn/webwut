<?php include '../services/checkLogin.php' ?>

<div id="banner"></div>
<nav class="navbar navbar-light" style="background-color: white;">
    <div class="container">
        <a class="navbar-brand" href="../../">
            <img src="../assets/image/logo.png" width="50" height="50"
                 class="d-inline-block align-top" alt="">
            <font size="6" color="#f675b3">WEBWUT <b>Event</b></font>
        </a>
        <?php
        if ($LOGGEDIN) {
            $ID = $_SESSION['ID'];
            echo "Welcome, " . $ID;
            ?>
            <button type="button" class="btn btn-light" id="btn-login"
                    role="button">SIGN OUT
            </button><?php
        } else {
            ?><a href="../login" class="btn btn-light" id="btn-login"
                 role="button">SIGN IN</a><?php
        }
        ?>
    </div>
</nav>
<div id="fake-navbar"></div>

