<?php

function updateUser($database, $data, $id)
{

    $name = $data['name'];
    $email = $data['email'];

    $sql = "UPDATE users SET name= '$name', email ='$email' WHERE id='$id'";
    // requlare expression to remove all spaces in my sql query
    $sql = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $sql);

    if ($database->query($sql) === TRUE) {
        return "Record updated successfully";
    }

    return false;

    $database->close();
}
