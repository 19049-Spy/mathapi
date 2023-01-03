<?php

// get the URL path and split it by the slashes
$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url_parts = explode('/', $url_path);

// check if the operation and numbers are provided
if (count($url_parts) < 3) {
    exit('Error: operation and/or numbers not provided.');
}

// get the operation and numbers from the URL
$operation = $url_parts[1];
$numbers = array_slice($url_parts, 2);

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