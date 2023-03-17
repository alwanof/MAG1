<?php
// Task 1 - Create a function that returns all users from the database
function getUsers($database)
{
     // Query the database for user data
     // Task1.1 edit the query below to return all users from the database
     $query = "";

     // don't toach following line and don't worry about this line, it just makes the query easier to read
     $query = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $query);

     // Task 1.2 complete the function body to return the users
     // hint: use fetch_assoc to get the result row
}

// example output of getUsers($database) 2 rows
// [
//     [
//         'id' => 1,
//         'name' => 'John Doe',
//         'email' => 'john@example.com'
//     ],
//     [
//         'id' => 2,
//         'name' => 'Jane Doe',
//         'email' => 'jane@example.com'
//     ]
// ]
