# PHP with MySQL Assignment(MAG1): Level Basic
## Scope:
The purpose of this assignment is to evaluate a student's understanding of using PHP with MySQL at a basic level.
## Instructions:
In this assignment, you will be working with a MySQL database containing two tables: users and orders. The users table contains information about users, and the orders table contains information about orders placed by those users. You will write PHP functions to perform various tasks on the database.
## Database schema:
The database schema consists of two tables:
1. users(id, name, email)
2. orders(id, user_id, product, quantity)
# Tasks:
1. Complete a PHP function **getUsers($database)** that retrieves all users from the users table in the database.
2. Complete a PHP function **getUserById($database, $userId)** that retrieves a single user from the users table in the database based on the provided user ID.
3. Complete a PHP function **insertUser($database, $data)** that inserts a new user into the users table in the database.
4. Complete a PHP function **updateUser($database, $data, $id)** that updates a user row in the users table in the database based on the provided user ID.
5. Complete a PHP function **removeUser($database, $id)** that removes a user row from the users table in the database based on the provided user ID.
6. Complete a PHP function **searchUsersByName($database, $name)** that searches for users in the users table in the database based on a provided name, and returns the result in descending order.
7. Complete a PHP function **getUsersWithOrderQuantity($database)** that performs a JOIN operation between the users and orders tables in the database, groups the results by user ID, and returns the total order quantity for each user.
