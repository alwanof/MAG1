<?php

declare(strict_types=1);
require_once 'src/Task1.php';
require_once 'src/Task2.php';
require_once 'src/Task3.php';
require_once 'src/Task4.php';
require_once 'src/Task5.php';
require_once 'src/Task6.php';
require_once 'src/Task7.php';

use PHPUnit\Framework\TestCase;

class TasksTest extends TestCase
{

    public function testGetUsers(): void
    {
        // Set up a mock database connection for testing
        $database = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Define the expected query and result
        $query = "SELECT * FROM users";
        $expected_result =
            [
                ['id' => 1, 'name' => 'John Doe', 'email' => 'johndoe@example.com'],
                ['id' => 2, 'name' => 'Jane Doe', 'email' => 'janedoe@example.com'],
                ['id' => 3, 'name' => 'Bob Smith', 'email' => 'bobsmith@example.com'],
            ];

        // Set up the mock result object
        $result = $this->getMockBuilder(mysqli_result::class)
            ->disableOriginalConstructor()
            ->getMock();
        $result->expects($this->any())
            ->method('fetch_assoc')
            ->will($this->onConsecutiveCalls(...$expected_result));

        // Set up the mock database query object
        $database->expects($this->once())
            ->method('query')
            ->with($query)
            ->willReturn($result);


        // Call the getUsers function and store the results in a variable
        $users = getUsers($database);

        // Verify that the getUsers function returned the expected results
        $this->assertEquals($expected_result, $users);
    }
    public function testGetUserById(): void
    {
        // Set up a mock database connection for testing
        $database = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Define the expected query, parameters, and result
        $query = "SELECT * FROM users WHERE id=?";
        $userId = 1;
        $expected_result = ['id' => 1, 'name' => 'John Doe', 'email' => 'johndoe@example.com'];

        // Set up the mock statement object
        $stmt = $this->getMockBuilder(mysqli_stmt::class)
            ->disableOriginalConstructor()
            ->getMock();
        $stmt->expects($this->once())
            ->method('execute')
            ->willReturn(true);
        $result = $this->getMockBuilder(mysqli_result::class)
            ->disableOriginalConstructor()
            ->getMock();
        $result->expects($this->once())
            ->method('fetch_assoc')
            ->willReturn($expected_result);
        $stmt->expects($this->once())
            ->method('get_result')
            ->willReturn($result);

        // Set up the mock database query object
        $database->expects($this->once())
            ->method('prepare')
            ->with($query)
            ->willReturn($stmt);

        // Call the getUserById function and store the result in a variable
        $user = getUserById($database, $userId);

        // Verify that the getUserById function returned the expected result
        $this->assertEquals($expected_result, $user);
    }

    public function testInsertUser(): void
    {
        // Set up a mock database connection for testing
        $database = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Define the expected user data
        $user_data = [
            'name' => 'John Smith',
            'email' => 'john@example.com'
        ];

        // Define the expected SQL query and result
        $query = "INSERT INTO users (name,email) VALUES ('John Smith','john@example.com')";


        // Set up the mock database query object
        $database->expects($this->once())
            ->method('query')
            ->with($query)
            ->willReturn(true);

        // Call the insertUser function and store the results in a variable
        $result = insertUser($database, $user_data);

        // Verify that the insertUser function executed the expected query

        $this->assertEquals($result, 'New record created successfully');
    }
    public function testUpdateUser(): void
    {
        // Set up a mock database connection for testing
        $database = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Define the expected user data
        $user_data = [
            'name' => 'John Smith',
            'email' => 'john@example.com'
        ];

        // Define the expected SQL query and result
        $user_id = 1;
        $query = "UPDATE users SET name='{$user_data['name']}',email='{$user_data['email']}' WHERE id='{$user_id}'";

        // Set up the mock database query object
        $database->expects($this->once())
            ->method('query')
            ->with($query)
            ->willReturn(true);

        // Call the updateUser function and store the results in a variable
        $result = updateUser($database, $user_data, $user_id);

        // Verify that the updateUser function executed the expected query

        $this->assertEquals($result, 'Record updated successfully');
    }
    public function testRemoveUser(): void
    {
        // Set up a mock database connection for testing
        $database = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();



        // Define the expected SQL query and result
        $user_id = 1;
        $query = "DELETE FROM users WHERE id='{$user_id}'";

        // Set up the mock database query object
        $database->expects($this->once())
            ->method('query')
            ->with($query)
            ->willReturn(true);

        // Call the updateUser function and store the results in a variable
        $result = removeUser($database, $user_id);

        // Verify that the updateUser function executed the expected query

        $this->assertEquals($result, 'Record removed successfully');
    }
    public function testSearchUsersByName(): void
    {
        // Set up a mock database connection for testing
        $database = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();
        $name = 'John';
        // Define the expected query and result
        $query = "SELECT * FROM users WHERE name LIKE '%$name%' ORDER BY id DESC";
        $expected_result =
            [
                ['id' => 1, 'name' => 'John Doe', 'email' => 'johndoe@example.com']
            ];

        // Set up the mock result object
        $result = $this->getMockBuilder(mysqli_result::class)
            ->disableOriginalConstructor()
            ->getMock();
        $result->expects($this->any())
            ->method('fetch_assoc')
            ->will($this->onConsecutiveCalls(...$expected_result));

        // Set up the mock database query object
        $database->expects($this->once())
            ->method('query')
            ->with($query)
            ->willReturn($result);


        // Call the getUsers function and store the results in a variable
        $users = searchUsersByName($database, $name);

        // Verify that the getUsers function returned the expected results
        $this->assertEquals($expected_result, $users);
    }

    public function testGetUsersWithOrderQuantity(): void
    {
        // Set up a mock database connection for testing
        $database = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Define the expected query and result
        $query = "SELECT users.id,users.name,users.email,SUM(orders.quantity) as total_quantity FROM users JOIN orders ON users.id=orders.user_id GROUP BY users.id";
        $expected_result =
            [
                [
                    "id" => "1",
                    "name" => "John",
                    "email" => "john@example.com",
                    "total_quantity" => "3"
                ],
                [
                    "id" => "2",
                    "name" => "Jane",
                    "email" => "jane@example.com",
                    "total_quantity" => "3"
                ]
            ];

        // Set up the mock result object
        $result = $this->getMockBuilder(mysqli_result::class)
            ->disableOriginalConstructor()
            ->getMock();
        $result->expects($this->any())
            ->method('fetch_assoc')
            ->will($this->onConsecutiveCalls(...$expected_result));

        // Set up the mock database query object
        $database->expects($this->once())
            ->method('query')
            ->with($query)
            ->willReturn($result);


        // Call the getUsers function and store the results in a variable
        $users = getUsersWithOrderQuantity($database);

        // Verify that the getUsers function returned the expected results
        $this->assertEquals($expected_result, $users);
    }
}
