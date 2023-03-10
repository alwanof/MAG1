<?php
function getUsersWithOrderQuantity($database)
{
     // Query the database for user data
     $query = "SELECT users.id, users.name, users.email, SUM(orders.quantity) as total_quantity FROM users JOIN orders ON users.id = orders.user_id GROUP BY users.id";
     $query = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $query);
     $result = $database->query($query);

     // Check for query errors
     if (!$result) {
          die('Query Error (' . $database->errno . ') ' . $database->error);
     }

     // Loop through the results and store them in an array
     $users = [];
     while ($row = $result->fetch_assoc()) {
          $users[] = $row;
     }

     return $users;
}
