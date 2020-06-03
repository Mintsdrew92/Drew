<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/Db.php';
include_once '../../models/Post.php';

$database = new DB();
$db = $database->connect();

$post = new POST($db);

$rawdata = json_decode(file_get_contents("php://input"));

$post->value1 = $rawdata->value1;
$post->value2 = $rawdata->value2;

if($post->createPOST())
 
{
    echo json_encode(array('message' => 'Successfully Created'));
} 
  else 
{
    echo json_encode(array('message' => 'Fail'));
}



