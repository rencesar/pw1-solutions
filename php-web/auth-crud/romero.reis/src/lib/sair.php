<?php
    session_start();
    session_destroy();
    setcookie(session_name(), 0, time()-10000);
    header('location:../index.html');
?>