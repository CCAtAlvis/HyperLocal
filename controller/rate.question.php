<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];

try {
    $rating = (string) $_POST['rating'];
    $question_id = (string) $_POST['question_id'];

    if(!$rating || !$question_id) {
        $res["status"]="ERROR";
        $res["message"]="Some fields are missing!";
        $resJson = json_encode($res);
        die($resJson);
    }


    $rating = (int) $rating;
    $question_id = (int) $question_id;

    $query = $conn->prepare("INSERT INTO `rating.question` (rating, question_id, creator_id)
     VALUES( :rating, :question_id, :creator_id );");
    $query->bindParam(':rating', $rating);
    $query->bindParam(':question_id', $question_id);
    $query->bindParam(':creator_id', $user_id);
    $result = $query->execute();

    if(!$result) {
        $res["status"]="ERROR";
        $res["message"]="Could not rate question";
        $resJson = json_encode($res);
        die($resJson);
    }

    $res['status'] = "SUCCESS";
    $res['message'] = "Inserted rating for question successfully";
    $res = json_encode($res);
    die($res);
} catch(Exception $e) {
    $res["status"]="ERROR";
    $res["message"]="Something went wrong! " . $e->getMessage();
    $res = json_encode($res);
    die($res);
}

?>