<?php

require './db.php';
date_default_timezone_set("Asia/Kolkata");

if( ((isset($_SESSION['login']) && $_SESSION['login'] == "LOGIN") ||
    (isset($_COOKIE['login']) && $_COOKIE['login'] == "LOGIN"))) {
    // some loccation to redirect
    header("Location: members/dashboard");
}

var_dump($_POST);

try {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $confcode = md5($email);
    // $date = date("Y-m-d H:i:s");
    $date = date(DATE_ISO8601);

    $query = $conn->prepare("INSERT INTO login (username, email, password, confcode, created_on)
    VALUES ( :username, :email, :password, :confcode, :time );");

    $query->bindParam(':username', $username);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $password);
    $query->bindParam(':confcode', $confcode);
    $query->bindParam(':time', $date);

    $query->execute();

    echo "inserted: $confcode";

    $conn = null;
}
catch(Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}
    
?>
