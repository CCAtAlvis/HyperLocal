<?php

require './controller/db.php';
date_default_timezone_set("Asia/Kolkata");
// header('Content-Type: application/json');
$res = [];


if( ((isset($_SESSION['login']) && $_SESSION['login'] == "LOGIN") ||
    (isset($_COOKIE['login']) && $_COOKIE['login'] == "LOGIN"))) {
    // some loccation to redirect
    // header("Location: members/dashboard");
}

try {
    $username = $_POST['username'] ?? false;
    $email = $_POST['email'] ?? false;
    $password = $_POST['password'] ?? false;
    $confpass = $_POST['confpass'] ?? false;
    $confcode = md5($email);
    // $date = date("Y-m-d H:i:s");
    $date = date(DATE_ISO8601);

    if(!$username || !$email || !$password || !$confpass) {
        $res["status"]="ERROR";
        $res["message"]="All fields are compulsory";

        $resJson = json_encode($res);
        die($resJson);    
    }

    if ($password !== $confpass) {
        $res["status"]="ERROR";
        $res["message"]="Passwords doesn't match!";

        $resJson = json_encode($res);
        die($resJson);    
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $res["status"]="ERROR";
        $res["message"]="Please enter a proper email.";

        $resJson = json_encode($res);
        die($resJson);
    }

    $query = $conn->prepare("SELECT username from login where username = :username");
    $query->bindParam(':username', $username);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($result) {
        $res["status"]="ERROR";
        $res["message"]="Username alread taken.";

        $resJson = json_encode($res);
        die($resJson);
    }

    $query = $conn->prepare("SELECT email from login where email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($result) {
        $res["status"]="ERROR";
        $res["message"]="Email alread registered.";

        $resJson = json_encode($res);
        die($resJson);
    }

    $password = password_hash($password, PASSWORD_BCRYPT);

    $query = $conn->prepare("INSERT INTO login (username, email, password, confcode, created_on)
    VALUES ( :username, :email, :password, :confcode, :time );");

    $query->bindParam(':username', $username);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $password);
    $query->bindParam(':confcode', $confcode);
    $query->bindParam(':time', $date);

    $query->execute();
    $conn = null;

    $res["status"]="SUCCESS";
    $res["message"]="Account Created Successfully!";
    $resJson = json_encode($res);
    die($resJson);
}
catch(Exception $e) {
    // echo 'ERROR: ' . $e->getMessage();
    $res["status"]="ERROR";
    $res["message"]="Something went wrong!";

    $res = json_encode($res);
    die($res);
}

?>
