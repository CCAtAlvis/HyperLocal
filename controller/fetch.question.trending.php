<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];

try {

    $query = $conn->prepare("SELECT * FROM questions
    WHERE created_on >= NOW() - INTERVAL 1 DAY");
    
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
