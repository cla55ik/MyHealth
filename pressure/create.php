<?php 

require($_SERVER['DOCUMENT_ROOT'] . '/controllers/dbController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/db_config.php');

$dbconf = new dbConnect;
$dbconn = $dbconf->getDbConfig();

$db = new dbController($dbconn);

$post = $_POST;
$create = $db->createPressure($post);
$res=[
    'status'=>'test',
    'message'=>'Не верный метод'
];
echo json_encode($post);
die();
$post = $_POST;