<?php

// check if sessions are enabled, but none exists.
if(session_status() === PHP_SESSION_NONE) { 
    session_start();
}

// check if the user are logged
if (!$_SESSION['username'])  {
    
    header('Location:../index.php');
}

// prevent URL manip
$pos = strpos( $_SERVER['PHP_SELF'], $_SESSION['role']);
if ($pos === false) {
    session_destroy();
    header('Location:../index.php');
}