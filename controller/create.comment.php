<?php

session_start();

require './controller/db.php';
date_default_timezone_set("Asia/Kolkata");
// header('Content-Type: application/json');
$res = [];

try {
    $question_id = (int) $_POST['question_id'] ?? false;
    $comment = (string) $_POST['comment'] ?? false;

    if(!$question_id || !$comment) {
        $res['status'] = "ERROR";
        $res['message'] = "Some Error";

        $res = json_encode($res);
        die($res);
    }

    if(strlen($comment) == 0) {
        $res['status'] = "ERROR";
        $res['message'] = "Comment is empty";

        $res = json_encode($res);
        die($res);
    }

    $query = $conn->prepare("INSERT INTO comments (question_id, comment, user_id)
     VALUES ( :question_id, :comment, :user_id );");
    $query->bindParam(':question_id', $question_id);
    $query->bindParam(':comment', $comment);
    $query->bindParam(':user_id', $user_id);
    $result = $query->execute();

    if(!$result) {
        $res["status"]="ERROR";
        $res["message"]="Could not insert comment.";

        $resJson = json_encode($res);
        die($resJson);
    }

    $res["status"] = "SUCCESS";
    $res["message"] = "Comment Posted Successfully";
    $resJson = json_encode($res);
    die($resJson);

} catch(Exception $e) {
    $res["status"]="ERROR";
    $res["message"]="Something went wrong! " + $e->getMessage();
    $res = json_encode($res);
    die($res);
}

?>