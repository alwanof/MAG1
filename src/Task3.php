<?php
// Task 3 - Create a function that inserts a new user into the database
function insertUser($database, $data)
{

    $name = $data['name'];
    $email = $data['email'];

    // Task 3.1 edit the query below to insert a new user into the database
    $sql = "";
    $sql = "INSERT INTO users (name, email)
     VALUES ('Bashir', 'Alrayes', 'bashir.freedom@gmail.com')";
    

    // don't toach following line and don't worry about this line, it just makes the query easier to read
    $sql = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $sql);

    // Task 3.2 complete the function body to insert the user
    // hint: use $database->query($sql) to execute the query
   
    
     if ($database->query($sql)) {
     echo 'New record created successfully';
  } else {
    echo 'New record not created successfully';
         
  }
    
    
}

// example output :
// 'New record created successfully' if the user was inserted successfully
// false if the user was not inserted successfully
