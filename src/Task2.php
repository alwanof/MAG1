<?php
function getUserById($database, $userId)
{
    // Prepare the query and bind the user ID parameter
    $query = "SELECT * FROM users WHERE id = ?";
    $query = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $query);
    $stmt = $database->prepare($query);
    $stmt->bind_param("i", $userId);

    // Execute the query and get the result
    $result = $stmt->execute();
    if (!$result) {
        die('Query Error (' . $stmt->errno . ') ' . $stmt->error);
    }

    // Fetch the result row and return it
    $row = $stmt->get_result()->fetch_assoc();
    return $row ? $row : null;
}
