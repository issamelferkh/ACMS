<?php

// put message function
function ft_putmsg($type, $message, $path) {

    // set url vars
    $host1 = $_SERVER['HTTP_HOST'];
    $protocol1 = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
    $url1 = "$protocol1://$host1/acms";

    // check session 
    if (session_status() === PHP_SESSION_NONE ) {
        session_start();
    }

    // set session vars
    $path = $url1.$path;
    $_SESSION['message'] = $message;
    $_SESSION['type'] = $type;

    // locat to the path
    echo '<script language="javascript">
            document.location.replace("'.$path.'");
        </script>';
    exit();

}

?>