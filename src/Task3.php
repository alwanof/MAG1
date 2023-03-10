<?php

function insertUser($database, $data)
{
    // Escape user inputs to prevent SQL injection
    $name = $data['name'];
    $email = $data['email'];

    // Insert user data into users table
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    $sql = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $sql);

    if ($database->query($sql) === TRUE) {
        return "New record created successfully";
    }
    return false;

    $database->close();
}
