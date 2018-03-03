<?php
    session_start();
    session_write_close();
    $LOGGEDIN = FALSE;
    if (array_key_exists('UID', $_SESSION)) {
        $LOGGEDIN = TRUE;
    }
?>