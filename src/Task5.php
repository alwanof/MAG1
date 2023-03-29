<?php
// Task 5 - Create a function that removes a user from the database
function removeUser($database, $id)
{

    // Task 5.1 edit the query below to remove a user from the database
    $sql = "DELETE FROM users WHERE id = $id";

    // don't toach following line and don't worry about this line, it just makes the query easier to read
    $sql = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $sql);

    // Task 5.2 complete the function body to remove the user
    // hint: use $database->query($sql) to execute the query
     $result = $database ->query($query);
     if (!$result[]) {
          die('false (' .$database->errno .') ' . $database->error);
     } else {
        return "Record removed successfully";
     }
}
// example output :
// 'Record removed successfully' if the user was removed successfully
// false if the user was not removed successfully
