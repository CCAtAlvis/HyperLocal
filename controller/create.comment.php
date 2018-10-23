<?php

session_start();

require './db.php';
date_default_timezone_set("Asia/Kolkata");
// header('Content-Type: application/json');
$res = [];

try {
    $post_id = (int) $_POST['postid'] ?? false;
    $comment = (string) $_POST['comment'] ?? false;

    if(!$post_id || !$comment) {
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

    $query = $conn->prepare("INSERT INTO comments (post_id, comment, user_id)
     VALUES ( :post_id, :comment, :user_id );");
    $query->bindParam(':question_id', $post_id);
    $query->bindParam(':comment', $comment);
    $query->bindParam(':user_id', $_SESSION['user_id']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($result) {
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