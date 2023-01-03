# My math API calculator
## Phase 1
- This would return the result of 5 + 3 + 4 + 1, which is 13. You can change the operation and numbers in the URL to perform different calculations.
- Example URL can be shown here: http://localhost/my-app/mathapi/f0/f1/index.php?operation=add&numbers[]=5&numbers[]=3&numbers[]=4&numbers[]=1
## Phase 2
- This will output the result in JSON format, with the key "result" and the value being the calculated result. For example, if the operation is "add" and the numbers are 1, 2, and 3, the output will be {"result": 6}.
- For example, to perform the add operation on the numbers 1, 2, and 3, the URL would be: http://localhost/my-app/mathapi/f0/f2/index.php/add/1/2/3
## Phase 3
- This modified script will use the file_get_contents function to read the raw data from the request body, and then use the json_decode function to parse the data into a PHP array. It will then get the operation and numbers from the array, and perform the calculation as before.
- To send a GET or POST request to this modified script with data in JSON format, you will need to set the Content-Type header of the request to application/json, and include the data in the request body in JSON format.
- For example, to send a POST request to the script with the add operation and numbers 1, 2, and 3, you could use the following curl command:
```
curl -X POST -H "Content-Type: application/json" -d '{"operation": "add", "numbers": [1, 2, 3]}' http://localhost/my-app/mathapi/f0/f3/index.php
```
- This would send a POST request to the script with the data {"operation": "add", "numbers": [1, 2, 3]} in the request body, and the script would parse the data and return the result in JSON format.
