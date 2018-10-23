<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];
try {

    $question = (string) $_POST['question'] ?? false;
    $latitude = (double) $_POST['latitude'] ?? false;
    $longitude = (double) $_POST['longitude'] ?? false;

    if(!$question || !$latitude || !$longitude) {
        $res['status'] = "ERROR";
        $res['message'] = "Some Error";

        $res = json_encode($res);
        die($res);
    }

    if(strlen($question) == 0) {
        $res["status"] = "ERROR";
        $res["message"] = "Question is Empty";

        $res = json_encode($res);
        die($res);    
    }

    $query = $conn->prepare("INSERT INTO questions (question, latitude, longitude, user_id)
     VALUES( :question, :latitude, :longitude, :user_id );");
    $query->bindParam(':question', $question);
    $query->bindParam(':latitude', $latitude);
    $query->bindParam(':longitude', $longitude);
    $query->bindParam(':user_id', $user_id);
    $result = $query->execute();

    if(!$result) {
        $res["status"]="ERROR";
        $res["message"]="Could not insert question.";

        $resJson = json_encode($res);
        die($resJson);
    }

    $res["status"] = "SUCCESS";
    $res["message"] = "Question Posted Successfully";
    $resJson = json_encode($res);
    die($resJson);

} catch(Exception $e) {
    $res["status"]="ERROR";
    $res["message"]="Something went wrong! ".$e->getMessage();
    $res = json_encode($res);
    die($res);
}
?>
