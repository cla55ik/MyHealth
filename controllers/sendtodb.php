<?php 

require($_SERVER['DOCUMENT_ROOT'] . '/controllers/dbController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/db_config.php');


$dbconf = new dbConnect;
$dbconn = $dbconf->getDbConfig();

$db = new dbController($dbconn);

// $post = json_decode(file_get_contents('php://input'), true);
$method = $_SERVER['REQUEST_METHOD'];
$post = $_POST;
// $create = $db->createPressure($post);
// $res=[
//     'status'=>'test',
//     'message'=>'Не верный метод'
// ];
// echo json_encode($post);
// die();
// $post = $_POST;


// return json_encode($post); die();

if (!isset($post)) {
    $res=[
        'status'=>'ok',
        'message'=>'Не верный метод'
    ];
    echo json_encode($res);
}

if (isset($post)) {
    // $post = $_POST;
    $create = $db->createPressure($post);


    $res=[
        'status'=>'ok',
        'message'=>'Данные сохранены'
    ];
    echo json_encode($res);
}

