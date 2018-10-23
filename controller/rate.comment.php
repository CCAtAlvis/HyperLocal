<?php

require './controller/db.php';
date_default_timezone_set("Asia/Kolkata");
// header('Content-Type: application/json');
$res = [];

try {
    $rating = (string) $_POST['rating'] ?? false;
    $comment_id = (string) $_POST['comment_id'] ?? false;

    if(!$rating || !$comment_id) {
        $res["status"]="ERROR";
        $res["message"]="Some fields are missing!";
        $resJson = json_encode($res);
        die($resJson);
    }

    $rating = (int) $rating;
    $comment_id = (int) $rating;

    $query = $conn->prepare("INSERT INTO `rating.comment` (rating, comment_id, creator_id)
     VALUES( :rating, :comment_id, :creator_id );");
    $query->bindParam(':rating', $rating);
    $query->bindParam(':comment_id', $comment_id);
    $query->bindParam(':creator_id', $user_id);
    $result =  $query->execute();

    if(!$result) {
        $res["status"]="ERROR";
        $res["message"]="Could not rate comment";
        $resJson = json_encode($res);
        die($resJson);
    }

    $res['status'] = "SUCCESS";
    $res['message'] = "Inserted rating for comment successfully";
    $res = json_encode($res);
    die($res);
} catch(Exception $e) {
    $res["status"]="ERROR";
    $res["message"]="Something went wrong! ".$e->getMessage();
    $res = json_encode($res);
    die($res);
}

?>