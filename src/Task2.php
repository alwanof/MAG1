<?php
// Task 2 - Create a function that returns a user by their ID
function getUserById($database, $userId)
{
    // Prepare the query and bind the user ID parameter
    // Task 2.1 edit the query below to return a user by their ID
    $query = "SELECT FROM users WHERE id = 1";
    // don't toach following line and don't worry about this line, it just makes the query easier to read
    $query = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $query);

    // Task 1.2 complete the function body to return the users
    // hint: use fetch_assoc to get the result row

}

 $users = [ ];
while = ($row = $result -> fetch_assoc()) {
     $users [ ] = $row ; 
}
return $users;

//example output of getUsers($database) 1 row
// [
//     'id' => 1,
//     'name' => 'John Doe',
//     'email' => 'john@example.com'
// ]
