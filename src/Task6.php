<?php
// Task 6 - Create a function that returns a list of users by their name
function searchUsersByName($database, $name)
{
     // Task 6.1 edit the query below to return a list of users by their name
     $query = "SELECT * FROM users WHERE name LIKE '%$name%' ORDER BY id DESC";

     // don't toach following line and don't worry about this line, it just makes the query easier to read
     $query = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $query);


     // Task 6.2 complete the function body to return the users
     // hint : use $database->query($query) to execute the query
     // hint: use fetch_assoc to get the result row
$result = $database->query($query);
	 $rows = [];
	 while($row = $result->fetch_assoc())
		 $rows[] = $row;
	 return $rows;
}
// example output of searchUsersByName($database, 'John') 2 rows
// [
//     [
//         'id' => 1,
//         'name' => 'John Doe',
//         'email' => 'john@example.com'
//     ],
//     [
//         'id' => 2,
//         'name' => 'John Smith',
//         'email' => 'john@example.com'
//     ]
// ]
