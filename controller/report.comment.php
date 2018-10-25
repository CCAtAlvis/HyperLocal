<?php

require './controller/db.php';
// header('Content-Type: application/json');
$res = [];

try {
    $comment_id = $_POST['comment_id'] ?? false;
    $report = $_POST['report'] ?? false;
    $creator_id = $_POST['creator_id'] ?? false;

    if (!$comment_id || !$report || !$creator_id) {
        $res["status"]="ERROR";
        $res["message"]="Some fields are missing!";
        $resJson = json_encode($res);
        die($resJson);
    }

    $comment_id = (int) $comment_id;
    $creator_id = (int) $creator_id;

    $query->prepare('INSERT INTO `report.comment` (comment_id, report, creator_id)
    VALUES ( :comment_id, :report, :creator_id )');
    $query->bindParam(':comment_id', $comment_id);
    $query->bindParam(':report', $report);
    $query->bindParam(':creator_id', $creator_id);

    $result = $query->execute();

    if(!$result) {
        $res["status"]="ERROR";
        $res["message"]="Could not report comment";
        $resJson = json_encode($res);
        die($resJson);
    }

    $res['status'] = "SUCCESS";
    $res['message'] = "Submitted report for comment successfully";
    $res = json_encode($res);
    die($res);
} catch(Exception $e) {
    $res["status"]="ERROR";
    $res["message"]="Something went wrong! ".$e->getMessage();
    $res = json_encode($res);
    die($res);
}

?>