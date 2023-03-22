<?php
// Task 4 - Create a function that updates a user in the database
function updateUser($database, $data, $id)
{

    $name = $data['name'];
    $email = $data['email'];
    // Task 4.1 edit the query below to update a user in the database
    $sql = "UPDATE users SET name='ahmed'  WHERE id=$id";

    // don't toach following line and don't worry about this line, it just makes the query easier to read
    $sql = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $sql);

    // Task 4.2 complete the function body to update the user
    // hint: use $database->query($sql) to execute the query
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}
// example output :
// 'Record updated successfully' if the user was updated successfully
// false if the user was not updated successfully
