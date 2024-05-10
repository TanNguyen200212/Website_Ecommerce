<?php
    session_start();
    unset($_SESSION['EMAIL_USER_LOGIN']);   
    session_unset();
    session_destroy();
    header("location: ../index.php");