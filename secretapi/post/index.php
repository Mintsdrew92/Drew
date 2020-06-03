<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Db.php';
include_once '../../models/Post.php';


$database = new DB();
$db = $database->connectdb();

$post = new POST($db);
$read = $post->read();
$show = $post->keyNtime();
$readRow = $read->rowCount();
$showRow = $show->rowCount();


if(isset($_POST['mykey']) && isset($_POST['timestamp']))
{
  
    $key = $_POST('mykey');
    $timestamp = $_POST('timestamp');  

    $check = $post->checkKey($key,$timestamp);

    $checktimestamp = date('H:i',strtotime($timestamp));
    $fiveChecks = sub_str($checktimestamp,3,1);

    if($fiveChecks = '0' || $fiveChecks = '5')
    {
        $showval2 = $post->showTwo($key);
    }
    
    else if($showRow > 0)
    {
        $showArr = array();
        $showArr['data'] = array();

        while($row = $show->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            $itemArr = array
            (
                'objectkey' => $objectkey,
                'time_created' => $time_created
            );
            array_push($readArr['data'], $itemArr);
        }
        echo json_encode($itemArr);
    }


}
else if(isset($_POST['mykey']))
{

    $key = $_POST['mykey'];
    $val1 = $_POST['value1'];
    $val2 = $_POST['value2'];

    $keyCheck = $post->keyCheck();
    $updateKey = $post->insertKey($key,$val1,$val2);

}


    


    




   



    if($readRow > 0)
    {
        $readArr = array();
        $readArr['result'] = array();

        while($row = $read->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            $itemArr = array(
                'value1' => $value1,
                'value2' => $value2
            );
            array_push($readArr['result'], $itemArr);
        }
        echo json_encode($itemArr);
    }
    else
    {
        echo json_encode(array('message' => 'No results'));
    }
    