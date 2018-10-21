<?php
    session_start();
    var_dump($_SESSION);

    $time = time() - (60*60*24*30*365);
    setcookie("login", "", $time, "/");
    setcookie("user_id", "", $time, "/");

    session_unset();
    var_dump($_SESSION);
?>