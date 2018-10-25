<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];

try {
    $query = $conn->prepare("SELECT q.question, q.question_id, q.created_on, l.username
    FROM questions as q, login as l
    WHERE q.user_id = l.user_id And
    question_id IN (
        SELECT question_id FROM `rating.question` GROUP BY (question_id)
        ORDER BY avg(rating) DESC
    )");
    
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
