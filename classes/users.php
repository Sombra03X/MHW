<?php

class Users
{
    // Properties
    private $user_id;
    private $username;
    private $password;
    private $email;
    private $role;
    private $conn;

    // Constructor
    public function __construct($user_id, $username, $password, $email, $role, $conn)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
        $this->conn = $conn;
    }

    // getters
    public function getUserId()
    {
        return $this->user_id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRole()
    {
        return $this->role;
    }

    // setters
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    // Methods
    // Create user
    public function createUser()
    {
        // define the query
        $sql = "INSERT INTO users (username, password, email, role) VALUES (':username', ':password', ':email', ':role')";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':role', $this->role);

            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Read user
    public function readUser()
    {
        // define the query
        $sql = "SELECT * FROM users WHERE user_id = :user_id";

        try {
            // prepre the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':user_id', $this->user_id);

            // execute the query
            $stmt->execute();

            // fetch the results
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // return the results
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Update user
    public function updateUser()
    {
        // define the query
        $sql = "UPDATE users SET username = :username, password = :password, email = :email, role = :role WHERE user_id = :user_id";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':role', $this->role);
            $stmt->bindParam(':user_id', $this->user_id);

            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Delete user
    public function deleteUser()
    {
        // define the query
        $sql = "DELETE FROM users WHERE user_id = :user_id";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':user_id', $this->user_id);

            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}