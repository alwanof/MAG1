<?php
// Task 4 - Create a function that updates a user in the database
function updateUser($database, $data, $id)
{

    $name = $data['name'];
    $email = $data['email'];
    // Task 4.1 edit the query below to update a user in the database
    $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = '$id'";

    // don't toach following line and don't worry about this line, it just makes the query easier to read
    $sql = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $sql);

    // Task 4.2 complete the function body to update the user
    // hint: use $database->query($sql) to execute the query
$result = $database->query($sql);
	if($result)
		return 'Record updated successfully';
	else
		return false;
}
// example output :
// 'Record updated successfully' if the user was updated successfully
// false if the user was not updated successfully
