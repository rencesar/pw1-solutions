<?php
    session_start();
    session_destroy();
    setcookie(session_name(), 0, time()-42000);
    header('location:../index.html');
?>