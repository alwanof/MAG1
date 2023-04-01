<?php
// Task 7 - Create a function that returns a list of users with the total quantity of orders they have made

function getUsersWithOrderQuantity($database)
{
     // Task 7.1 edit the query below to return a list of users with the total quantity of orders they have made
     $query = "SELECT users.id, users.name, users.email, COUNT (orders.quantity)
               AS total_quantity
               ORDER BY quantity DESC
               FROM users";

     // don't toach following line and don't worry about this line, it just makes the query easier to read
     $query = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $query);

     // Task 7.2 complete the function body to return the users
     // hint : use $database->query($query) to execute the query
     // hint: use fetch_assoc to get the result rows
}
$result = $database -> query ($query); 
     if ( !$result) {
          die ('Quary Error ( '.$database -> error .')'.$database -> error );
     }

     $users = [ ];
while = ($row = $result -> fetch_assoc()) {
     $users [ ] = $row ; 
}
return $users;
// example output of getUsersWithOrderQuantity($database) 2 rows
// [
//     [
//         'id' => 1,
//         'name' => 'John Doe',
//         'email' => 'john@example.com',
//         'total_quantity' => 3
//     ],
//     [
//         'id' => 2,
//         'name' => 'Jane Doe',
//         'email' => 'jane@example.com',
//         'total_quantity' => 3
//     ]
// ]
