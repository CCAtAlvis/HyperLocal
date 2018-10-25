<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];

try {
    $latitude = $_POST['latitude'] ?? false;
    $longitude = $_POST['longitude'] ?? false;

    if(!$latitude || !$longitude) {
        $res['status'] = "ERROR";
        $res['message'] = "Some fields are missing";
    }

    $latitude = (double) $latitude;
    $longitude = (double) $longitude;

    $min_latitude = $latitude - 0.0005;
    $max_latitude = $latitude + 0.0005;

    $min_longitude = $longitude - 0.0005;
    $max_longitude = $longitude + 0.0005;

    $query = $conn->prepare("SELECT * FROM questions
        WHERE
            latitude BETWEEN :min_latitude AND :max_latitude
        AND
            longitude BETWEEN :min_longitude AND :max_longitude");
    
    $query->bindParam(':min_latitude', $min_latitude);
    $query->bindParam(':max_latitude', $max_latitude);
    $query->bindParam(':min_longitude', $min_longitude);
    $query->bindParam(':max_longitude', $max_longitude);

    $query->execute();

    $questions = array();

    while($question = $query->fetch(PDO::FETCH_ASSOC)) {
        array_push($questions, $question);
    }

    $res['status'] = "SUCCESS";
    $res['message'] = $questions;
    $res = json_encode($res);
    die($res);

} catch(Exception $e) {
    $res["status"]="ERROR";
    $res["message"]="Something went wrong! " . $e->getMessage();
    $res = json_encode($res);
    die($res);
}

?>
