<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];

try {

    $query = $conn->prepare("SELECT questions.question, questions.question_id, questions.created_on, login.username, login.user_id
    FROM login 
    JOIN questions ON questions.user_id = login.user_id 
    WHERE questions.created_on >= NOW() - INTERVAL 1 DAY  ORDER BY questions.created_on DESC LIMIT 25");
    
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
