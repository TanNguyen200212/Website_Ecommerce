<?php
    session_start();
    unset($_SESSION['EMAIL_USER_LOGIN']);   
    session_unset($_SESSION['EMAIL_USER_LOGIN']);
    session_destroy($_SESSION['EMAIL_USER_LOGIN']);
    header("location:index.php");
