<?php
// Task 2 - Create a function that returns a user by their ID
function getUserById($database, $userId)
{
    // Prepare the query and bind the user ID parameter
    // Task 2.1 edit the query below to return a user by their ID
    $query = "SELECT *FROM users WHERE id = ?";
    // don't toach following line and don't worry about this line, it just makes the query easier to read
    $query = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $query);

    // Task 1.2 complete the function body to return the users
    // hint: use fetch_assoc to get the result row
    if ($database->connect_error) {
  die("Connection failed: " . $database->connect_error);
}

$userId = "SELECT *FROM users WHERE id = ?";
$result = $database->query($userId);
    
    while($row = $result->fetch_assoc()) {
    echo . $row["id"]."<br>" ;
  }

}

//example output of getUsers($database) 1 row
// [
//     'id' => 1,
//     'name' => 'John Doe',
//     'email' => 'john@example.com'
// ]
