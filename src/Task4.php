<?php
// Task 4 - Create a function that updates a user in the database
function updateUser($database, $data, $id)
{

    $name = $data['name'];
    $email = $data['email'];
    // Task 4.1 edit the query below to update a user in the database
    $sql = UBDATE users
        SET email ='bashir.alrayes1@gmail.com',
        name ='Bashir alrayes'
            where id=1;
    

    // don't toach following line and don't worry about this line, it just makes the query easier to read
    $sql = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $sql);

    // Task 4.2 complete the function body to update the user
    // hint: use $database->query($sql) to execute the query
    
    if ($database->query($sql)) {
     echo 'New record ubdated successfully';
  } else {
    echo 'New record not ubdated successfully';
         
  }

}
// example output :
// 'Record updated successfully' if the user was updated successfully
// false if the user was not updated successfully
