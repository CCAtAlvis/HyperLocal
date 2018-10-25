<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];

$login = $_SESSION["login"] ?? $_COOKIE["login"] ?? false;
$user_id = $_SESSION["user_id"] ?? $_COOKIE["user_id"] ?? false;

if ($login === "LOGIN" && $user_id) {
    // some loccation to redirect
    // header("Location: members/dashboard");
    // send response to redirect
    $res["status"]="SUCCESS";
    $res["message"]="Redirect User";

    // set the session for user
    $_SESSION["login"] = "LOGIN";
    $_SESSION["user_id"] = $user_id;

    // set cookies
    $cookie = [];
    $cookie["time"] =   time() + (60*60*24*30*365);

    // set cookie for login
    $cookie["name"] = "login";
    $cookie["value"] = "LOGIN";
    setcookie($cookie["name"], $cookie["value"], $cookie["time"], "/");

    // set cookie for user details
    $cookie["name"] = "user_id";
    $cookie["value"] = $user_id;
    setcookie($cookie["name"], $cookie["value"], $cookie["time"], "/");

    $res = json_encode($res);
    die($res);
}

// var_dump($_POST);

try {
    $param = $_POST['param'] ?? false;
    $password = $_POST['password'] ?? false;
    $sql = "";

    if (!$param || !$password) {
        $res["status"]="ERROR";
        $res["message"]="All fields are compulsory";

        $res = json_encode($res);
        die($res);
    }

    if (!filter_var($param, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT password, user_id from login where username = :param";
    } else {
        $sql = "SELECT password, user_id from login where email = :param";
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

    // start user session
    $_SESSION["login"] = "LOGIN";
    $_SESSION['user_id'] = $result["user_id"];

    // set user cookies
    $cookie = [];
    $cookie["time"] =   time() + (60*60*24*30*365);

    // set cookie for login
    $cookie["name"] = "login";
    $cookie["value"] = "LOGIN";
    setcookie($cookie["name"], $cookie["value"], $cookie["time"], "/");

    // set cookie for user details
    $cookie["name"] = "user_id";
    $cookie["value"] = $result["user_id"];
    setcookie($cookie["name"], $cookie["value"], $cookie["time"], "/");

    $res["status"]="SUCCESS";
    $res["message"]="Redirect User";

    $res = json_encode($res);
    die($res);
}
catch(Exception $e) {
    // echo 'ERROR: ' . $e->getMessage();
    $res["status"]="ERROR";
    $res["message"]="Something went wrong! ERROR: " . $e->getMessage();

    $res = json_encode($res);
    die($res);
}

?>
