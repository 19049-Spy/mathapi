<?php

// get the raw data from the request body
$raw_data = file_get_contents("php://input");

// parse the data as JSON
$data = json_decode($raw_data, true);

// check if the operation and numbers are provided
if (!isset($data['operation']) || !isset($data['numbers'])) {
    exit('Error: operation and/or numbers not provided.');
}

// get the operation and numbers from the data
$operation = $data['operation'];
$numbers = $data['numbers'];

// initialize the result to the first number
$result = $numbers[0];

// perform the operation on the remaining numbers
for ($i = 1; $i < count($numbers); $i++) {
    switch ($operation) {
        case 'add':
            $result += $numbers[$i];
            break;
        case 'subtract':
            $result -= $numbers[$i];
            break;
        case 'multiply':
            $result *= $numbers[$i];
            break;
        case 'divide':
            // check if trying to divide by 0
            if ($numbers[$i] == 0) {
                exit('Error: cannot divide by zero.');
            }
            $result /= $numbers[$i];
            break;
        default:
            exit('Error: invalid operation.');
    }
}

// return the result in JSON format
echo json_encode(array("result" => $result));