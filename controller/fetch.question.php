<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];

try {
    // TODO, get lat and lng bounds
    // Make a query that finds posts within these bounds
    // Umm, that's it ?
    // For now, I'm pulling all posts
    $query = $conn->prepare("SELECT * FROM questions");
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