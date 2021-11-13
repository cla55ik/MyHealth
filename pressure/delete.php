<?php

require($_SERVER['DOCUMENT_ROOT'] . '/controllers/dbController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/db_config.php');

$dbconf = new dbConnect;
$dbconn = $dbconf->getDbConfig();

$db = new dbController($dbconn);

$post = $_POST;
if (empty($post['curr_id']) || $post['curr_id']<=0) {
    $res = [
        'status' => 'error',
        'message' => "пустой ID {$post['curr_id']}"
    ];
    echo json_encode($res);

}else{
    $create = $db->deletePressure($post['curr_id']);
    $res = [
        'status' => 'Ok',
        'message' => "DELETE ID {$post['curr_id']}"
    ];
    echo json_encode($res);
}

die();
$post = $_POST;
