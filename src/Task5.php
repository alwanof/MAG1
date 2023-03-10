<?php

function removeUser($database, $id)
{


    $sql = "DELETE FROM users WHERE id='$id'";
    // requlare expression to remove all spaces in my sql query
    $sql = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $sql);

    if ($database->query($sql) === TRUE) {
        return "Record removed successfully";
    }

    return false;

    $database->close();
}
