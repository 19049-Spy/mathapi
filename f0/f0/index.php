=-<?php
$number = filter_input(INPUT_GET, 'number', FILTER_VALIDATE_FLOAT);
if($number === null){
    reply(["error" => "No number"]);
}
if($number === false){
    reply(["error" => "Not number (float, int0"]);
}
reply(["result" => $number * 2]);

function reply(array $data){
    echo json_encode($data);
    exit;
}
?>