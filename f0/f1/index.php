<?php

// check if the operation and numbers are provided
if (!isset($_GET['operation']) || !isset($_GET['numbers']) || !is_array($_GET['numbers'])) {
    exit('Error: operation or numbers not provided.');
}

// get the operation and numbers from the GET request
$operation = $_GET['operation'];
$numbers = $_GET['numbers'];

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

// return the result
echo $result;


/*http://localhost/my-app/mathapi/f0/f1/index.php?operation=add&numbers[]=5&numbers[]=3&numbers[]=4&numbers[]=1

This would return the result of 5 + 3 + 4 + 1, which is 13. You can change the operation and numbers in the URL to perform different calculations.*/