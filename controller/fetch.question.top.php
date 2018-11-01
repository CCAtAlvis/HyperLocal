<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];

try {
    $query = $conn->prepare("SELECT q.question, q.question_id, q.created_on, l.username, l.user_id, avg(r.rating)
    FROM questions as q, login as l, `rating.question` as r
    WHERE q.user_id = l.user_id AND r.question_id=q.question_id 
    GROUP BY (r.question_id) ORDER BY (avg(r.rating)) DESC LIMIT 10");

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
