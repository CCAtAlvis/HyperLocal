<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];

try {
    $question_id = $_POST['question_id'] ?? false;
    $report = $_POST['report'] ?? false;
    $creator_id = $_POST['creator_id'] ?? false;

    if (!$question_id || !$report || !$creator_id) {
        $res["status"]="ERROR";
        $res["message"]="Some fields are missing!";
        $resJson = json_encode($res);
        die($resJson);
    }

    $question_id = (int) $question_id;
    $creator_id = (int) $creator_id;

    $query->prepare('INSERT INTO `report.comment` (question_id, report, creator_id)
    VALUES ( :question_id, :report, :creator_id )');
    $query->bindParam(':question_id', $question_id);
    $query->bindParam(':report', $report);
    $query->bindParam(':creator_id', $creator_id);

    $result = $query->execute();

    if(!$result) {
        $res["status"]="ERROR";
        $res["message"]="Could not report question";
        $resJson = json_encode($res);
        die($resJson);
    }

    $res['status'] = "SUCCESS";
    $res['message'] = "Submitted report for question successfully";
    $res = json_encode($res);
    die($res);
} catch(Exception $e) {
    $res["status"]="ERROR";
    $res["message"]="Something went wrong! ".$e->getMessage();
    $res = json_encode($res);
    die($res);
}

?>