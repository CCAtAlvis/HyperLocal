<?php

// session_start();

require './controller/db.php';
// date_default_timezone_set("Asia/Kolkata");
// header('Content-Type: application/json');
$res = [];

try {
    $question_id = (string) $_POST['question_id'] ?? false;

    if(!$question_id) {
        $res['status'] = "ERROR";
        $res['message'] = "Some Error";

        $res = json_encode($res);
        die($res);
    }

    if(strlen($question_id) == 0) {
        $res['status'] = "ERROR";
        $res['message'] = "question_id is blank";

        $res = json_encode($res);
        die($res);
    }

    $query = $conn->prepare("SELECT c.comment, c.comment_id, c.created_on, l.username
        FROM comments as c, login as l
        WHERE question_id = :question_id AND c.user_id = l.user_id");

    $query->bindParam(':question_id', $question_id);
    $query->execute();

    $comments = array();

    while($comment = $query->fetch(PDO::FETCH_ASSOC)) {
        array_push($comments, $comment);
    }

    $res['status'] = "SUCCESS";
    $res['message'] = $comments;
    $res = json_encode($res);
    die($res);

} catch(Exception $e) {
    $res["status"]="ERROR";
    $res["message"]="Something went wrong! " + $e->getMessage();
    $res = json_encode($res);
    die($res);
}

?>
