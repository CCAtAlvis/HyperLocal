<?php

session_start();

require './db.php';
date_default_timezone_set("Asia/Kolkata");
// header('Content-Type: application/json');
$res = [];


if( ((isset($_SESSION['login']) && $_SESSION['login'] == "LOGIN") ||
    (isset($_COOKIE['login']) && $_COOKIE['login'] == "LOGIN"))) {
    // some loccation to redirect
    header("Location: members/dashboard");
}

// var_dump($_POST);

try {
    $param = $_POST['param'] ?? null;
    $password = $_POST['password'] ?? null;
    $sql = "";

    if (!$param || !$password) {
        $res["status"]="ERROR";
        $res["message"]="All fields are compulsory";

        $res = json_encode($res);
        die($res);
    }

    if (!filter_var($param, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT password from login where username = :param";
    } else {
        $sql = "SELECT password from login where email = :param";
    }

    $query = $conn->prepare($sql);
    $query->bindParam(':param', $param);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)) {
        $res["status"]="ERROR";
        $res["message"]="No account found.";
    
        $resJson = json_encode($res);
        die($resJson);
    }

    if(!password_verify($password, $result["password"])) {
        $res["status"]="ERROR";
        $res["message"]="Username or Password incorrect.";
    
        $resJson = json_encode($res);
        die($resJson);
    }

    $conn = null;
    
    $res["status"]="SUCCESS";
    $res["message"]="Logging you in";

    $_SESSION["login"] = "LOGIN";

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
